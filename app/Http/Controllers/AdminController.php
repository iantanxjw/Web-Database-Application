<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ApiRequest;
use App\Movies;
use App\Movie;

class AdminController extends Controller
{
    public function api_refresh()
    {
        // get all of the possible poster and bg sizes to pick from
        $json = file_get_contents(config("tmdb.api.config_url") . "?api_key=" . config("tmdb.api.key"));
        $data = json_decode($json);

        //return var_dump($data);

        return view("admin.api_refresh", [
            "backdrop_sizes" => $data->images->backdrop_sizes,
            "poster_sizes" => $data->images->poster_sizes
        ]);
    }

    public function updateAPI(Request $request)
    {
        $apiRequest = null;
        $movies = null;

        if ($request->api === "list")
        {
            $apiRequest = new ApiRequest(config("tmdb.api.list_url"), config("tmdb.api.showing_list") . "?", null, null, $request->postersize, $request->bgsize);
            $movies = $apiRequest->request("showing");
        }
        else
        {
            $apiRequest = new ApiRequest(config("tmdb.api.url"), $request->input("api") . "?", null, null, $request->postersize, $request->bgsize);
            $movies = $apiRequest->request($request->input("type"));

        }

        $success = [];
        $update = [];
        $failure = [];

        // now loop over the movies and fill the db
        foreach ($movies as $movie)
        {
            // prevent movies from being added that already exist
            if (Movies::where("id", $movie->getID())->exists())
            {
                // get the movie in the database
                $result = Movies::find($movie->getID());

                // create a movie object to make it easier to compare with
                // the movie trying to insert
                $dbMovie = new Movie(
                    $result->id,
                    $result->title,
                    $result->desc,
                    $result->release_date,
                    $result->voteAvg,
                    $result->status,
                    $result->genre,
                    $result->poster,
                    $result->bg
                );

                // compare with movie you're trying to add
                if ($movie->getVars() !== $dbMovie->getVars())
                {
                    // they differ so update with new cols
                    $result->update($movie->getVars());
                    $update[] = $movie->getTitle();
                    
                }
                else
                {
                    // values don't differ so don't update
                    $failure[] = $movie->getTitle();
                    
                }
            }
            else
            {
                // FML THIS IS ASSOCIATIVE NOT ORDERED
                Movies::create($movie->getVars());
                $success[] = $movie->getTitle();
                
            }
        }

        /* use flash so that the data is only kept for the next 
            http request then deleted on the next request */
        $request->session()->flash("update", $update);
        $request->session()->flash("errors", $failure);
        $request->session()->flash("success", $success);

        return redirect()->route("admin_movies.index");
    }   
}
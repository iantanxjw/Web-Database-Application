<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ApiRequest;
use App\User;
use App\Movies;
use App\Movie;
use App\Session;
use App\Theatre;
use App\Booking;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.panel");
    }

    public function movies()
    {
        $movies = Movies::all()->sortBy("title");
        $movieObjects = [];

        foreach($movies as $movie)
        {
            $movieObjects[] = new Movie(
                $movie->id,
                $movie->title,
                $movie->desc,
                $movie->release_date,
                $movie->voteAvg,
                $movie->status,
                $movie->genre,
                $movie->poster,
                $movie->bg
            );
        }

        return view("admin.movies", compact("movieObjects"));
    }

    public function sessions()
    {
        $sessions = Session::all();

        return view("admin.sessions", compact("sessions"));
    }

    public function users()
    {
        $users = User::all();

        return view("admin.users", compact("users"));
    }

    public function locations()
    {
        $locations = Theatre::all();

        return view("admin.locations", compact("locations"));
    }

    public function api_refresh()
    {
        return view("admin.api_refresh");
    }

    public function updateAPI(Request $request)
    {
        $apiRequest = new ApiRequest(config("tmdb.api.url"), $request->input("api") . "?");
        $movies = $apiRequest->request($request->input("type"));

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

        return view("admin.panel");
    }   
}
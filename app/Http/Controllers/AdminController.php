<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;
use App\ApiRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.panel");
    }

    public function add_movie()
    {
        return view("admin.add_movie");
    }

    public function remove_movie()
    {
        return view("admin.remove_movie");
    }

    public function add_session()
    {
        return view("admin.add_session");
    }

    public function remove_session()
    {
        return view("admin.remove_session");
    }

    public function api_refresh()
    {
        return view("admin.api_refresh");
    }

    public function updateAPI(Request $request)
    {
        $apiRequest = new ApiRequest(config("tmdb.api.url"), $request->input("api") . "?");
        $movies = $apiRequest->request();

        $success = [];
        $failure = [];

        // now loop over the movies and fill the db
        foreach ($movies as $movie)
        {
            // prevent movies from being added that already exist
            if (Movies::where("mv_id", $movie->getId())->exists())
            {
                $failure[] = $movie->getTitle();
            }
            else
            {
                // FML THIS IS ASSOCIATIVE NOT ORDERED
                Movies::create([
                    "mv_id" => $movie->getID(),
                    "title" => $movie->getTitle(),
                    "desc" => $movie->getDescription(),
                    "release_date" => $movie->getReleaseDate(),
                    "genre" => serialize($movie->getGenre()),
                    "poster" => $movie->getPoster(),
                    "bg" => $movie->getBackground()
                ]);

                $success[] = $movie->getTitle();
            }
        }

        return view("admin.panel", compact("success", "failure"));
    }   
}
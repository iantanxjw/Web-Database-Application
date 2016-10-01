<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ApiRequest;
use App\Movie;
use App\Movies;

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
        $json = ApiRequest::getRequest($request->input("api"));

        // get an array of movie objects to dump into db
        $movies = ApiRequest::getMovieDetails($json);

        // now loop over the movies and fill the db
        foreach ($movies as $movie)
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
        }

        return view("admin.test")->with("movie", $movies[0]->getVars());
        //return view("admin.panel");
    }
}
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
use App\DatabaseRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.panel");
    }

    public function movies()
    {
        // get all movies in the db - TABLE NAME MUST BE LOWER CASE!!
        $dbr = new DatabaseRequest("movies");
        $movies = $dbr->getAllDataSortedBy("title");
        $movieObjects = [];

        // need to figure out a way to unserialise genre and linkify poster and bg
        foreach ($movies as $movie)
        {
            $movieObjects[] = new Movie($movie->mv_id, $movie->title, $movie->desc, $movie->release_date, $movie->genre, $movie->poster, $movie->bg);
        }

        return view("admin.movies", compact("movieObjects"));
    }

    public function sessions()
    {
        $dbr = new DatabaseRequest("sessions");
        $sessions = $dbr->getAllData();

        return view("admin.sessions", compact("sessions"));
    }

    public function users()
    {
        $dbr = new DatabaseRequest("users");
        $users = $dbr->getAllData();

        return view("admin.users", compact("users"));
    }

    public function locations()
    {
        $dbr = new DatabaseRequest("locations");
        $locations = $dbr->getAllData();

        return view("admin.locations", compact("locations"));
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
                Movies::create($movie->getVars());

                $success[] = $movie->getTitle();
            }
        }

        return view("admin.panel", compact("success", "failure"));
    }   
}
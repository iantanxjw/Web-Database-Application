<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;
use App\Session;
use App\Theatre;


class ClientRequestsController extends Controller
{
    public function ajax(Request $request)
    {
        $movies = null;
        $limit = 20; // hard coded for now need to find a better way
        $voteAvg = 6;

        if (isset($request->limit) && !empty($request->limit))
        {
            $limit = $request->limit;
        }

        if (isset($request->voteAvg) && !empty($request->voteAvg))
        {
            $voteAvg = $request->voteAvg;
        }

        // some basic security - prevent users from injecting ajax requests
        if ($request->type === "popular")
        {
            // only get movies for the carousel that have a background
            $movies = Movies::where("voteAvg", ">=", $voteAvg)
                            ->where("status", "showing")
                            ->whereNotNull("bg")
                            ->inRandomOrder()
                            ->take($limit)
                            ->get();
        }
        else if ($request->type === "showing")
        {
            $movies = Movies::where("status", "showing")->take($limit)->get();
        }
        else if ($request->type === "upcoming")
        {
            $movies = Movies::where("status", "upcoming")->take($limit)->get();
        }
        else
        {
            return "nice try ya spaz";
        }

        $json = [];

        foreach ($movies as $movie)
        {
            $json[] = [
                "id" => $movie->id,
                "title" => $movie->title,
                "desc" => $movie->desc,
                "release_date" => $movie->release_date,
                "voteAvg" => $movie->voteAvg,
                "genre" => $movie->genre,
                "poster" => $movie->poster,
                "bg" => $movie->bg
            ];
        }

        return json_encode($json);
    }

    public function getTheatres()
    {
        return json_encode(Theatre::all());
    }

    // get _exact_ movie by the id
    public function getMovieByID(Request $request)
    {
        if (!isset($request->id))
        {
            return null;
        }

        $movie = Movies::find($request->id);

        return json_encode($movie);
    }

    // get _exact_ movie by the title
    public function getMovieByTitle(Request $request)
    {
        if (!isset($request->title))
        {
            return null;
        }

        $movie = Movies::where("title", $request->title)->first();

        return json_encode($movie);
    }

    // get a bunch of movies similar to the title given - at least 3 chars
    public function searchForMovies(Request $request)
    {
        if (!isset($request->title) || strlen($request->title) < 3)
        {
            return null;
        }

        $movies = Movies::where("title", "like", "%". strtolower($request->title) . "%")->get();
        $json = [];

        foreach ($movies as $movie)
        {
            $json[] = [
                "id" => $movie->id,
                "title" => $movie->title,
                "desc" => $movie->desc,
                "release_date" => $movie->release_date,
                "voteAvg" => $movie->voteAvg,
                "genre" => $movie->genre,
                "poster" => $movie->poster,
                "bg" => $movie->bg
            ];
        }

        return json_encode($json);
    }

    // get sessions for movie by the id
    public function getMovieIDSessions(Request $request)
    {
        if (!isset($request->id))
        {
            return null;
        }

        $movie = Movies::find($request->id);

        if (!isset($movie))
        {
            return "Couldn't find movie with the id: " . $request->id;
        }

        $sessions = Session::where("mv_id", $movie->id)->get();

        return json_encode($sessions);
    }

    // get sessions for movie by _exact_ title
    public function getMovieTitleSessions(Request $request)
    {
        if (!isset($request->title))
        {
            return null;
        }

        $movie = Movies::where("title", $request->title)->get();

        if (!isset($movie))
        {
            return "Couldn't find movie with the title: " . $request->title;
        }

        $sessions = Session::where("mv_id", $movie->id)->get();

        return json_encode($sessions);
    }

    // get the theatre from the session
    public function getTheatreFromSession(Request $request)
    {
        if (!isset($request->id))
        {
            return null;
        }

        $theatre = Theatre::find($request->id);

        if (!isset($theatre))
        {
            return "Could not find movie theatre with the id: " . $request->id;
        }

        return json_encode($theatre);
    }

    // get all sessions at a specific theatre
    public function getSessionsAtTheatre(Request $request)
    {
        if (!isset($request->location))
        {
            return null;
        }

        $theatre = Theatre::where("location", $request->location)->get();

        if (!isset($theatre))
        {
            return "Could not find any theatres at: " . $request->location;
        }

        $sessions = Session::where("t_id", $theatre->id);

        return json_encode($sessions);
    }

    //get locations into a list and then and then
    // get all sessions at a specific theatre
    public function getLocationsForMovie(Request $request)
    {
        $json = [];

        if (!isset($request->m_id))
        {
            return null;
        }

        $location_id = Session::where("mv_id", $request->m_id)->get();

        foreach ($location_id as $id)
        {
            $location = Theatre::find($id->t_id);
            $json[] = [
                "id" => $id->t_id,
                "location" => $location->location
            ];
        }

       // $result = array_unique($json);
        return json_encode($json);
    }

    // get all the movies showing at this location
    public function getTheatreMovies(Request $request)
    {
        if (!isset($request->location))
        {
            return null;
        }

        // find all theatres where location name matches
        $theatre = Theatre::where("location", "like", "%" . $request->location . "%")->get();

        if (!isset($theatre))
        {
            return "Could not find any theatres with name: " . $request->location;
        }

        // find all sessions at that theatre
        $sessions = Session::where("t_id", $theatre[0]->id)->get();

        if (!isset($sessions))
        {
            return "Could not any sessions at: " . $request->location;
        }

        $movies = [];

        // for each session get the movie
        foreach ($sessions as $session)
        {
            $movies[] = Movies::find($session->mv_id);
        }

        return json_encode($movies);
    }
}

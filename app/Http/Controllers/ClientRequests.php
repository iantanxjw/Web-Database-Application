<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;

class ClientRequests extends Controller
{
    public function ajax(Request $request)
    {
        $movies = null;
        $limit = 20; // hard coded for now need to find a better way

        if (isset($request->limit) && !empty($request->limit))
        {
            $limit = $request->limit;
        }

        // some basic security - prevent users from injecting ajax requests
        if ($request->type === "popular")
        {
            // only get movies for the carousel that have a background
            $movies = Movies::where("voteAvg", ">=", 6)
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
            echo "nice try ya spaz";
            return;
        }

        $json = [];

        foreach ($movies as $movie)
        {
            $json[] = ["id" => $movie->id,
                        "title" => $movie->title,
                        "desc" => $movie->desc,
                        "release_date" => $movie->release_date,
                        "voteAvg" => $movie->voteAvg,
                        "genre" => $movie->genre,
                        "poster" => $movie->poster,
                        "bg" => $movie->bg];
        }

        echo json_encode($json);
    }
}

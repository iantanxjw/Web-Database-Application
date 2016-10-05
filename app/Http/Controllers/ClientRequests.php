<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;

class ClientRequests extends Controller
{
    public function ajax(Request $request)
    {
        // $movies = null;

        // if ($request->type === "popular")
        // {
        //     $movies = Movies::where("voteAvg", ">=", 5);
        // }
        // else
        // {
        //     $movies = Movies::where("status", $request->type)->get();
        // }

        $movies = Movies::where("status", $request->type)->get();

        $json = [];

        foreach ($movies as $movie)
        {
            $json[] = ["id" => $movie->mv_id,
                        "title" => $movie->title,
                        "desc" => $movie->desc,
                        "release_date" => $movie->release_date,
                        "popularity" => $movie->popularity,
                        "genre" => $movie->genre,
                        "poster" => $movie->poster,
                        "bg" => $movie->bg];
        }

        echo json_encode($json);
    }
}

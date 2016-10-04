<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie;
use App\DatabaseRequest;

class ClientRequests extends Controller
{
    public function ajax()
    {
        $dbr = new DatabaseRequest("movies", 10);
        $movies = $dbr->getAllData();

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

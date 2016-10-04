<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ApiRequest;

class ClientRequests extends Controller
{
    public function ajax(Request $request)
    {
        $apiRequest = new ApiRequest(config("tmdb.api.url"), $request->type . "?", $request->options);
        $movies = $apiRequest->request();
        $json = [];

        foreach ($movies as $movie)
        {
            $json[] = [
                "id" => $movie->getID(),
                "title" => $movie->getTitle(),
                "overview" => $movie->getDescription(),
                "release_date" => $movie->getReleaseDate(),
                "popularity" => $movie->getPopularity(),
                "genre" => $movie->getGenre(),
                "poster" => $movie->getPoster(),
                "background" => $movie->getBackground()
            ];
            //$json[] = [$movie->getVars()];
        }

        echo json_encode($json);
    }
}

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
            $json[] = $movie->getVars();
        }

        echo json_encode($json);
    }
}

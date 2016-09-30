<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class ApiRequest extends Model
{
    // returns an object
    public static function getRequest($request_type)
    {
        // add ? for get request
        $request_type = $request_type . "?";

        // get request options - make sure to put key in your .env!!
        $data = http_build_query([
            "api_key" => config("tmdb.api.key"),
            "language" => "en-US"
        ]);

        // get the result of the request
        $json = file_get_contents(config("tmdb.api.url") . $request_type . $data);

        return $json;
    }

    // returns an object of type movie with relevant details
    public static function getMovieDetails($json)
    {
        $json = json_decode($json);
        $movies = [];

        // now populate with relevant bs
        foreach ($json->results as $result)
        {
            // create a movie object and dump it into an array of movies
            $movie = new Movie($result->id, $result->title, $result->overview,
                                $result->release_date, $result->genre_ids,
                                $result->poster_path, $result->backdrop_path);
            $movies[] = $movie;
        }

        return $movies;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class ApiRequest extends Model
{
    private $url;
    private $request_type;
    private $options;

    public function __construct($url = null, $request_type = null, $options = null)
    {
        $this->setUrl($url);
        $this->setRequestType($request_type);
        $this->setOptions($options);
    }

    public function setUrl($url)
    {
        if (!isset($url) || $url === "")
        {
            $this->url = config("tmdb.api.url");
        }
        else
        {
            $this->url = $url;
        }
    }

    public function setRequestType($request_type)
    {
        if (!$request_type || $request_type === "")
        {
            $this->request_type = "top_rated?";
        }
        else
        {
            $this->request_type = $request_type;
        }
    }

    public function setOptions($options)
    {
        if (isset($options))
        {
            foreach ($options as $key => $val)
            {
                $this->options[$key] = $value;
            }
        }

        $this->options["api_key"] = config("tmdb.api.key");
        $this->options["language"] = config("tmdb.api.default_language");
    }

    // returns an array of movie objects
    public function request()
    {
        $json = file_get_contents($this->url . $this->request_type . http_build_query($this->options));

        $data = json_decode($json);
        $movies = [];

        // now populate with relevant bs
        foreach ($data->results as $result)
        {
            // create a movie object and dump it into an array of movies
            $movie = new Movie($result->id, $result->title, $result->overview,
                                $result->release_date, $result->popularity, $result->genre_ids,
                                $result->poster_path, $result->backdrop_path);
            $movies[] = $movie;
        }

        return $movies;
    }










    //         // batch insert to db from api
    // public static function batchInsert(Request $request)
    // {
    //     $json = ApiRequest::getRequest($request->input("api"));

    //     // get an array of movie objects to dump into db
    //     $movies = ApiRequest::getMovieDetails($json);
        

    //     return [$success, $failure];
    // }

    // // insert single movie
    // public static function insert(Request $request)
    // {

    // }

    // // batch update from api
    // public static function batchUpdate(Request $request)
    // {

    // }

    // // remove movie from database
    // public static function remove(Request $request)
    // {

    // }

    //     return view("admin.panel", compact("data"));
    // }
}

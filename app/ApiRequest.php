<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class ApiRequest extends Model
{
    private $url;
    private $imgUrl;
    private $posterSize;
    private $bgSize;
    private $request_type;
    private $options;
    private $genres;

    public function __construct($url = null, $request_type = null, $options = null, $imgUrl = null, $posterSize = null, $bgSize = null)
    {
        $this->setUrl($url);
        $this->setRequestType($request_type);
        $this->setOptions($options);
        $this->setImgUrl($imgUrl);
        $this->setPosterSize($posterSize);
        $this->setBgSize($bgSize);
        $this->setGenres();
    }

    public function getGenres()
    {
        return $this->genres;
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

    public function setImgUrl($imgUrl)
    {
        if (!isset($imgUrl))
        {
            $this->imgUrl = config("tmdb.api.img_url");
        }
        else
        {
            $this->imgUrl = $imgUrl;
        }
    }

    public function setPosterSize($posterSize)
    {
        if (!isset($posterSize) && $this->imgUrl === config("tmdb.api.img_url"))
        {
            // only change set the size to original if using tmdb
            $this->posterSize = "original/";
        }
        else
        {
            // otherwise set it to null or whatever
            $this->posterSize = $posterSize;
        }
    }

    public function setBgSize($bgSize)
    {
        if (!isset($bgSize) && $this->imgUrl === config("tmdb.api.img_url"))
        {
            $this->bgSize = "original/";
        }
        else
        {
            $this->bgSize = $bgSize;
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

    // calls the api for genre ids and names
    private function setGenres()
    {
        $json = file_get_contents(config("tmdb.api.genre_url") . "?api_key=" . config("tmdb.api.key"));
        $this->genres = json_decode($json)->genres;
    }

    // returns an array of movie objects
    public function request($requestType)
    {
        $json = file_get_contents($this->url . $this->request_type . http_build_query($this->options));

        $data = json_decode($json);
        $movies = [];

        // now populate with relevant bs
        foreach ($data->results as $result)
        {
            // get the names from genre ids
            $genre = $this->getGenreNames($result->genre_ids);

            // create a movie object and dump it into an array of movies
            // if poster or bg aren't set they're set as null
            $movies[] = new Movie(
                $result->id, 
                $result->title,
                $result->overview,
                $result->release_date,
                $result->vote_average,
                strtolower($requestType),
                $genre,
                isset($result->poster_path) ? $this->imgUrl . $this->posterSize . $result->poster_path : null,
                isset($result->backdrop_path) ? $this->imgUrl . $this->bgSize . $result->backdrop_path : null
            );
        }

        return $movies;
    }

    // returns a comma delim string
    private function getGenreNames($idArray)
    {
        $genreString = "";

        foreach ($this->genres as $index)
        {
            foreach ($idArray as $genreID)
            {
                if ($index->id === $genreID)
                {
                    $genreString .= $index->name . ", ";
                }
            }
        }

        // remove trailing comma and space
        return substr($genreString, 0, -2);
    }
}

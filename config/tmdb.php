<?php

// API related stuff goes in this file

return [
    "api" => [
        "url" => "https://api.themoviedb.org/3/movie/",
        "img_url" => "http://image.tmdb.org/t/p/h632/",
        // make sure to dump the api key in your .env file!!! like: TMDB_API_KEY=<key>
        "key" => env("TMDB_API_KEY"),
        "default_language" => "en-US"
    ]
];
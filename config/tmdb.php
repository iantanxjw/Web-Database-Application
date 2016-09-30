<?php

// API related stuff goes in this file

return [
    "api" => [
        "url" => "https://api.themoviedb.org/3/movie/",
        // make sure to dump the api key in your .env file!!! like: TMDB_API_KEY=<key>
        "key" => env("TMDB_API_KEY")
    ]
];
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        return json_decode($json);
    }
}

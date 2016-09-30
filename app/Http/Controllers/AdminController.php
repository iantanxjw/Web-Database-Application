<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.panel");
    }

    public function add_movie()
    {
        return view("admin.add_movie");
    }

    public function remove_movie()
    {
        return view("admin.remove_movie");
    }

    public function add_session()
    {
        return view("admin.add_session");
    }

    public function remove_session()
    {
        return view("admin.remove_session");
    }

    public function api_refresh()
    {
        return view("admin.api_refresh");
    }

    public function updateAPI(Request $request)
    {
        $url = "https://api.themoviedb.org/3/movie/" . $request->input("api") . "?api_key=767dab209295a6b3b0ff89be7be1fa86&language=en-US";

        // options for the request
        $options = [
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n", 
                "method" => "GET"]];

        // create the stream from the options
        $context = stream_context_create($options);

        // open the stream and get the result of the query
        $result = file_get_contents($url, false, $context);

        return view("admin.test", compact("result"));
    }
}
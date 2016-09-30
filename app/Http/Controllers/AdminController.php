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
        // url to post to
        $url = "https://api.themoviedb.org/3/movie/";

        // type to update db and add ? for get request
        $api_type = $request->input("api") . "?";

        // get variables to send 
        // HOW THE FUCK DO I STORE THIS BS IN .ENV
        $data = http_build_query([
            "api_key" => "767dab209295a6b3b0ff89be7be1fa86",
            "language" => "en-US"
        ]);

        // get the result
        $result = file_get_contents($url . $api_type . $data);

        // pass the result to the view 
        return view("admin.test", compact("result"));
    }
}
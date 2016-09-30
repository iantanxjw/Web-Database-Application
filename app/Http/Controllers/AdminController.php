<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ApiRequest;

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
        $json_obj = ApiRequest::getRequest($request->input("api"));

        return view("admin.test")->with("json", $json_obj);

        // pass the result to the view 
        // return view("admin.test", compact("result"));
    }
}
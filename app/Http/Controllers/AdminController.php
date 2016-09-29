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

    public function updateAPI()
    {
        return view("admin.panel");
    }
}
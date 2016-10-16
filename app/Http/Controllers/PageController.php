<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;

class PageController extends Controller
{
    public function index()
    {
        return view("default");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function contact()
    {
        return view("contact");
    }

    public function about()
    {
        return view("about");
    }

    public function form()
    {
        return view("Bookings.form");
    }

    public function summary()
    {
        return view('summary');

    }

    public function search()
    {


        return view("search");
    }
    
    public function icons()
    {


        return view("icons");
    }
}

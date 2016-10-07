<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;
use App\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movies::all()->sortBy("title");
        $movieObjects = [];

        foreach ($movies as $movie)
        {
            $movieObjects[] = new Movie(
                $movie->mv_id,
                $movie->title,
                $movie->desc,
                $movie->release_date,
                $movie->voteAvg,
                $movie->status,
                $movie->genre,
                $movie->poster,
                $movie->bg
            );
        }

        return view("admin.movies", compact("movieObjects"));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($movieID)
    {

    }

    public function edit($movieID)
    {

    }

    public function update(Request $request, $movieID)
    {

    }

    public function destroy($id)
    {
        Movies::find($id)->delete();
        Sessions::find($id)->delete();
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movies;
use App\Movie;
use App\Session;
use App\ApiRequest;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movies::all()->sortBy("title");
        $movieObjects = [];

        foreach ($movies as $movie)
        {
            $movieObjects[] = new Movie(
                $movie->id,
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

        // null api request fpurely for genres;
        $apir = new ApiRequest();
        $genres = $apir->getGenres();
        $gnrs = [];

        /* loop through the genres as set the key as the name 
            and value as the name (for select box) */
        foreach ($genres as $genre)
        {
            $gnrs[$genre->name] = $genre->name;
        }

        return view("admin.movies", compact("movieObjects", "gnrs"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id" => "required",
            "title" => "required",
            "desc" => "required",
            "release_date" => "required",
            "status" => "required",
        ]);

        /* use offsetSet to modify requests
            genre is an array so implode it make it a comma delim string */
        $request->offsetSet("genre", implode(", ", $request->genre));
        Movies::create($request->all());
        return redirect()->route("admin_movies.index")->with("success", $request->title . " added successfully");
    }

    public function edit($movieID)
    {
        $movie = Movies::find($movieID);
        return json_encode($movie);
    }

    public function update(Request $request, $movieID)
    {
        $this->validate($request, [
            "id" => "required",
            "title" => "required",
            "desc" => "required",
            "release_date" => "required",
            "status" => "required",
        ]);

        $request->offsetSet("genre", implode(", ", $request->genre));
        Movies::find($movieID)->update($request->all());

        return redirect()->route("admin_movies.index")->with("success", $movieID . " updated successfully");
    }

    public function destroy($movieID)
    {
        /* delete any rows with the foreign key $movieID BEFORE
            trying to delete the row in the parent table */
        foreach (Session::where("mv_id", $movieID)->get() as $session)
        {
            $session->delete();
        }

        Movies::find($movieID)->delete();
        
        return redirect()->route("admin_movies.index")->with("success", $movieID . " deleted sucessfully");    
    }
}

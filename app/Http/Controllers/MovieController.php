<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('Movies.movies', ['movies' => $movies]);
        
    }

    public function create(){
        return view('Movies.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'genre'=> 'required',
            'year'=> 'required|numeric',

        ]);

        $newMovie = Movie::create($data);

        return redirect(route('movie.index'));

    }

    public function edit(Movie $movie){
        return view('movies.edit',['movie' => $movie ]);
    }

    public function update(Movie $movie, Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'genre'=> 'required',
            'year'=> 'required|numeric',

        ]);

        $movie->update($data);
        return redirect(route('movie.index'))->with('success', 'Movie Updated Succesfully');
    }
}

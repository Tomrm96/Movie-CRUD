<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(){
        return view('Movies.movies');
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
}

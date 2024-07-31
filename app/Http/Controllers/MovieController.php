<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Services\MovieService;
use App\Http\Requests\movieValidator;

class MovieController extends Controller
{

    public function show()
    {
        $movies = Movie::all();
        return response()->json(['movies' => $movies]);

    }

    public function store(movieValidator $request){
        $data = $request->validated();

        $newMovie = Movie::create($data);

        return response()->json();

    }

    // public function edit(Movie $movie){
    //     return view('movies.edit',['movie' => $movie ]);
    // }

    public function update(Movie $movie, movieValidator $request){
        $data = $request->validated();

        if(!$data)
        {
            return response()->json(['error!' => 'query is empty'], 400);
        }
        $movie->update($data);
        return response()->json(['success' => 'Movie updated successfully'], 200);
    }

    public function destroy(Movie $movie){
        $movie->delete();
        return redirect(route('movie.index'))->with('success', 'Movie Deleted Succesfully', 200);
    }

}

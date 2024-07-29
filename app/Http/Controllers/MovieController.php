<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Services\MovieService;


class MovieController extends Controller
{

    protected $MovieService;


    public function __construct(MovieService $MovieService){
        $this->MovieService = $MovieService;
    }

    public function search(Request $request){
        $query = $request->input('query');

        if (!$query){
            return response()->json(['error!' => 'query is empty']);

        }

        $movies = $this->MovieService->searchMovies($query);
        return response()->json($movies);

    }


    public function show($id){
        $movie = $this->MovieService->getMovieDetails($id);

        if(!$movie){
            return response()->json(['error!' => 'movie not found']);
        }
        return response()->json($movie);
    }

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

    public function destroy(Movie $movie){
        $movie->delete();
        return redirect(route('movie.index'))->with('success', 'Movie Deleted Succesfully');
    }

    public function tmdbIndex(){
        return view('movies.tmdb');
    }



}

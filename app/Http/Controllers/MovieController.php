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
        return view('movies.tmdb', ['movies' => $movies['results']]);

    }


    public function getTop100Movies()
    {
        $moviesData = $this->MovieService->getTop100();
    
        if (!$moviesData) {
            return response()->json(['error!' => 'error in collecting movies']);
        }
    
        return view('movies.100', ['movies' => $moviesData['results']]);
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
            'name' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);

        $newMovie = Movie::create($data);

        return redirect()->route('movie.index')->with('success', 'Movie added successfully');

    }

    public function edit(Movie $movie){
        return view('movies.edit',['movie' => $movie ]);
    }

    public function update(Movie $movie, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'description' => 'required',
        ]);

        $movie->update($data);
        return redirect(route('movie.index'))->with('success', 'Movie Updated Succesfully');
    }

    public function destroy(Movie $movie){
        $movie->delete();
        return redirect(route('movie.index'))->with('success', 'Movie Deleted Succesfully');
    }

    public function tmdbIndex(){
        return view('movies.tmdb', ['movies' => []]);
    }

    public function topTMDB(){
        return view('movies.100', ['movies' => []]);
    }

}

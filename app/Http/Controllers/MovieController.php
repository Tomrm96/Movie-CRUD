<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Services\MovieService;
use App\Http\Requests\movieValidator;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{

    public function show():JsonResponse
    {
        $movies = Movie::all();
        return response()->json(['movies' => $movies]);

    }

    public function store(movieValidator $request):JsonResponse
    {
        $data = $request->validated();

        $newMovie = Movie::create($data);

        return response()->json();

    }


    public function update(Movie $movie, movieValidator $request):JsonResponse
    {

        $data = $request->validated();

        if(!$data)
        {

            return response()->json(['error!' => 'query is empty'], 400);
        }
        $movie->update($data);

        return response()->json(['success' => 'Movie updated successfully'], 200);
    }

    public function destroy(Movie $movie):JsonResponse
    {
        $movie->delete();
       
        return response()->json(['success' => 'Movie Deleted successfully'], 200);
    }

}

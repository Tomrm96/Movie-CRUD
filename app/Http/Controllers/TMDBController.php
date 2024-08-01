<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Services\MovieService;
use App\Http\Requests\movieValidator;
use Illuminate\Http\JsonResponse;

class TMDBController extends Controller
{
    protected $MovieService;

    public function __construct(MovieService $MovieService){
        $this->MovieService = $MovieService;
    }

    public function search(Request $request):JsonResponse
    {
        $query = $request->input('query');
        if (!$query){
            return response()->json(['error!' => 'query is empty'], 500);
        }
        $movies = $this->MovieService->searchMovies($query);
        return response()->json(['movies' => $movies['results']]);
    }

    public function getTop100Movies():JsonResponse
    {
        $moviesData = $this->MovieService->getTop100();
        if (!$moviesData) {
            return response()->json(['error!' => 'error in collecting movies'], 500);
        }
        return response()->json(['movies' => $moviesData['results']]);
    }


}

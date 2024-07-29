<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class MovieService
{
    protected $API_URL;
    protected $API_KEY;

    public function __construct(){
        $this->API_URL = env('MOVIE_API_URL');
        $this->API_KEY = env('MOVIE_API_KEY');
    }

    public function searchMovies($query)
    {
        $response = Http::get("{$this->API_URL}/search/movie", [
            'api_key' => $this->API_KEY,
            'query' => $query,
        ]);

        return $response->json();

    }


    public function getMovieDetails($id){
        $response = Http::get("{$this->API_URL}/movie/{$id}", [
            'api_key' => $this->API_KEY,
        ]);

        return $response->json();
    }



}

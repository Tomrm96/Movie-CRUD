<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;


class MovieService
{
    protected $client;
    protected $API_URL;
    protected $API_KEY;

    public function __construct(){
        $this->API_URL = env('MOVIE_API_URL');
        $this->API_KEY = env('MOVIE_API_KEY');

        $this->client = Http::baseUrl($this->API_URL);
    }

    public function searchMovies($query):Array
    {
        $response = $this->client->get('/search/movie', [
            'api_key' => $this->API_KEY,
            'query' => $query,
        ]);
        return $response->json();

    }


    public function getTop100():Array
    {
        $response = $this->client->get('/movie/top_rated', [
            'api_key' => $this->API_KEY,
            'language' => 'en-US',
            'page' => 1
        ]);
        return $response->json();
    }

}




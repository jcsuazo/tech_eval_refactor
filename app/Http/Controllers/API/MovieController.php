<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{

    public function index()
    {
        return Movie::latest()->paginate(9);
    }


    public function store(StoreMovieRequest $request, Movie $movie)
    {
        $movie->store_movie_to_database($request);
        return Movie::create($request->all());
    }


    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update_movie($request);
        return ['message' => 'updated'];
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return ['message' => 'movie deleted'];
    }

    public function findMovie()
    {
        if ($search = \Request::get('q')) {
            $movies = Movie::where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })->paginate(20);
        } else {
            $movies = Movie::latest()->paginate(10);
        }
        return $movies;
    }
}

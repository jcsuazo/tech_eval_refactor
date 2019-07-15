<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Movie;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users_count = User::all()->count();
        $movies_count = Movie::all()->count();
        $favorites_count = User::with('movies')->get()->pluck('movies')->flatten()->count();
        $top_favorites_movies = DB::table('movies')
            ->join('movie_user', 'movies.id', '=', 'movie_user.movie_id')
            ->select('movies.*', DB::raw('count(movies.id) as favorite_count'))
            ->groupBy('movies.id')
            ->orderBy('favorite_count', 'desc')
            ->limit(3)
            ->get();
        return [
            'users' => $users_count,
            'movies' => $movies_count,
            "favorites_count" => $favorites_count,
            'top_favorites_movies' => $top_favorites_movies
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

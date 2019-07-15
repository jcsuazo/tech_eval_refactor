<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\Movie;
use Illuminate\Support\Facades\DB;

class DashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->withoutWrapping();
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
}

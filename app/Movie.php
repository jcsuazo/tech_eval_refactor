<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['title', 'imdb_number', 'year', 'poster'];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function store_movie_to_database($request)
    {
        if ($request->poster !== 'movie.js') {
            try {
                $name = substr($request->title, 0, 5) . '_' . time() . '.' . explode(';', explode('/', $request->poster)[1])[0];
                \Image::make($request->poster)->resize(320, 200)->save(public_path('img/profile/') . $name);
            } catch (\Exception $e) {
                $name = 'movie.js';
            }
            $request->merge(['poster' => $name]);
        }
    }
    public function update_movie($request)
    {
        if ($request->poster !== $this->poster) {
            $name = substr($request->title, 0, 5) . '_' . time() . '.' . explode(';', explode('/', $request->poster)[1])[0];
            \Image::make($request->poster)->resize(320, 200)->save(public_path('img/profile/') . $name);
            $request->merge(['poster' => $name]);
        }
        $this->update($request->all());
    }
}

<?php

use App\User;
use App\Movie;
use App\Movie_User;
use Illuminate\Support\Facades\DB;

//Testing Route
Route::get('/test', function (User $user) {
    //
});
//Login Routes
Route::get('/', function () {
    return view('auth.login');
});
//Login and register routes
Auth::routes();
//Home Routes
Route::get('/home', 'PagesController@homeIndex')->name('home');
//User Routes
Route::get('/users', 'PagesController@userIndex');
Route::get('/users/{user}', 'PagesController@userShow');
//Movies
Route::get('/movies', 'PagesController@moviesIndex');
Route::get('/browse', 'PagesController@moviesBrowse');
//Dev
Route::get('/dev', 'PagesController@dev');


// select movies.*, count(movies.id) as favorite_count FROM movies JOIN movie_user ON movies.id = movie_user.movie_id GROUP BY movies.id ORDER BY `favorite_count` DESC

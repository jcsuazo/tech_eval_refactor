<?php

use App\User;
use App\Movie;
use App\Movie_User;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function (User $user) {
    //
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users', 'UsersController');
Route::resource('/movies', 'MovieController');
Route::get('/browse', 'MovieController@browse');
Route::view('/dev', 'pages.developer');


// select movies.*, count(movies.id) as favorite_count FROM movies JOIN movie_user ON movies.id = movie_user.movie_id GROUP BY movies.id ORDER BY `favorite_count` DESC

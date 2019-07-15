<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Movie_User;

$factory->define(Movie_User::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'movie_id' => function () {
            return factory(\App\Movie::class)->create()->id;
        }
    ];
});

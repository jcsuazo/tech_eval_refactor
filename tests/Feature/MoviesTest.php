<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class MoviesTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function a_auth_user_can_see_all_movies()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $this->get('/api/movie')->assertJsonStructure();
    }
    /** @test */
    public function an_admin_user_can_create_a_movie()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        // $data = factory(\App\Movie::class)->raw();
        $data = [
            "title" => "revenge of the fallen",
            "imdb_number" => "bobytss44y",
            "year" => "1988",
            "poster" => "movie.js"
        ];
        $this->post('/api/movie', $data);
        $this->assertDatabaseHas('movies', $data);
    }
    /** @test */
    public function an_admin_user_can_see_a_user_data()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $user = factory(\App\User::class)->create();
        $this->get('/api/user/' . $user->id)->assertSee($user->name)->assertSee($user->email)->assertSee($user->last_name);
    }
    /** @test */
    public function an_admin_user_can_update_a_movie()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $movie = factory(\App\Movie::class)->create();
        $data = [
            "title" => "updatedTitle",
            "imdb_number" => $movie->imdb_number,
            "year" => $movie->year,
            "poster" => $movie->poster
        ];
        $this->patch('/api/movie/' . $movie->id, $data);
        $updated_movie = \App\Movie::find($movie->id);
        $this->assertEquals($data['title'], $updated_movie->title);
    }
    /** @test */
    public function an_admin_user_delete_a_movie()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $user = factory(\App\Movie::class)->create();
        $this->delete('/api/movie/' . $user->id);
        $this->assertDatabaseMissing('movies', [$user->name]);
    }
}

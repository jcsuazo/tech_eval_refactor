<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Hash;

class UsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function a_auth_user_can_see_his_information()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $this->get('/api/user')->assertJsonStructure();

        //Given
        //user is authenticated
        //When
        //post requet create product
        //Then
        //product exists
    }
    /** @test */
    public function a_auth_user_can_store_users()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $data = [
            "email" => "bobytss44y@me.com",
            "name" => "bobytss44y",
            "last_name" => "suazo",
            "role" => "user",
            "age" => "22",
            "password" => '02Vend@r'
        ];
        $this->post('/api/user', $data);
        unset($data['password']);
        $this->assertDatabaseHas('users', $data);
    }
    /** @test */
    public function an_admin_can_see_a_user_data()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $user = factory(\App\User::class)->create();
        $this->get('/api/user/' . $user->id)->assertSee($user->name)->assertSee($user->email)->assertSee($user->last_name);
    }
}

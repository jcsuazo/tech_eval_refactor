<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

class UsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function a_auth_user_can_see_his_information()
    {
        $this->withoutExceptionHandling();
        $user = Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $this->get('/api/getUser')->assertSee($user->id)->assertSee($user->name)->assertSee($user->email);
    }
    /** @test */
    public function a_auth_user_can_see_his_information_on_json()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $this->get('/api/user')->assertJsonStructure();
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
    public function an_admin_user_can_see_a_user_data()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $user = factory(\App\User::class)->create();
        $this->get('/api/user/' . $user->id)->assertSee($user->name)->assertSee($user->email)->assertSee($user->last_name);
    }
    /** @test */
    public function an_admin_user_can_update_a_user()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $user = factory(\App\User::class)->create();
        $data = [
            "email" => "updated@me.com",
            "name" => $user->name,
            "last_name" => $user->last_name,
            "role" => $user->role,
            "age" => $user->age,
            "password" => $user->password
        ];
        $this->patch('/api/user/' . $user->id, $data);
        $updated_user = \App\User::find($user->id);
        $this->assertEquals($data['email'], $updated_user->email);
    }
    /** @test */
    public function an_admin_user_delete_a_user()
    {
        $this->withoutExceptionHandling();
        Passport::actingAs(factory(\App\User::class)->create(['role' => 'admin']));
        $user = factory(\App\User::class)->create();
        $this->delete('/api/user/' . $user->id);
        $this->assertDatabaseMissing('users', [$user->name]);
    }
}

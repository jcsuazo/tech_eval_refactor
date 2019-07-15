<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create(['role' => 'admin', 'email' => 'admin@me.com', 'password' => Hash::make('02Vend@r')]);
        factory(\App\Movie_User::class, 50)->create();
    }
}

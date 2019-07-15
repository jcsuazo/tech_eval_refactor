<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_name', 'role', 'age'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function favorites()
    {
        return $this->hasMany(\App\Favorite::class);
    }
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
    public function store_user_to_database($request)
    {
        $user = $this->create([
            'email' => $request['email'],
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'role' => $request['role'],
            'age' => $request['age'],
            'password' => Hash::make($request['password']),
        ]);
        return $user;
    }
}

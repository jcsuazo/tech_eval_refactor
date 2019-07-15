<?php

namespace App\Http\Controllers;

use App\User;
use App\Movie;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('pages.users');
    }
    public function show(User $user)
    {
        return view('pages.user', compact('user'));
    }
}

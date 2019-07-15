<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //Home
    public function homeIndex()
    {
        return view('pages.dashboard');
    }
    //user
    public function userIndex()
    {
        return view('pages.users');
    }
    public function userShow(User $user)
    {
        return view('pages.user', compact('user'));
    }
    //movies
    public function moviesIndex()
    {
        return view('pages.movies');
    }
    public function moviesBrowse()
    {
        return view('pages.browse');
    }
    //Dev
    public function dev()
    {
        return view('pages.developer');
    }
}

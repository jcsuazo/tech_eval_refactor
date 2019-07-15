<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('pages.movies');
    }
    public function browse()
    {
        return view('pages.browse');
    }
}

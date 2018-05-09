<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Config;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function add()
    {
        $genres = Genre::orderBy('genre_name')->get();

        return view('music.add')->with([
            'genres' => $genres
        ]);
    }

    public function genres()
    {
        return view('music.genres');
    }

    public function contact()
    {
        return view('pages.contact')->with([
            'email' => Config::get('app.supportEmail')
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function library()
    {
        return view('music.library');
    }

    public function add()
    {
        return view('music.add');
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

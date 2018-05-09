<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicController extends Controller
{
    // function to replace youtube link with embedded version

    // preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$post_details['description']);

    public function add(Request $request)
    {
        $this->validate($request, [
            'songLink' => 'required',
            'songGenre' => 'required|digits:4|numeric',
        ]);

        $songLink = $request->input('songLink');
        $songGenre = $request->input('songGenre');

        return view('music.add')->with([
            // add data to send here
            'songLink' => $songLink,
            'songGenre' => $songGenre
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Cohensive\Embed\Embed;
use Illuminate\Http\Request;
use App\Song;

class MusicController extends Controller
{
    // function to replace youtube link with embedded version

    //

    public function add(Request $request)
    {
        $this->validate($request, [
            'songName' => 'required|alpha_spaces',
            'artist' => 'required|alpha_spaces',
            'songLink' => 'required|active_url'
        ]);

        $songName = $request->input('songName');
        $artist = $request->input('artist');
        $songLink = $request->input('songLink');
        $songComment = $request->input('songComment');

        // make  embedded code  out of the original url

        $embed = 'test';

        /*
         *
         *
        $embed = Embed::make('http://youtu.be/uifYHNyH-jA')->parseUrl();

        if ($embed) {

            $embed->setAttribute(['width' => 400]);
        }*/

        $song = new Song();
        $song->song_name = $songName;
        $song->song_url = $songLink;
        $song->song_embed_code = $embed;
        $song->song_comment = $songComment;
        $song->save();

        // Save the song to the database...

        return view('music.add')->with([
            // add data to send here
            'songName' => $songName,
            'artist' => $artist,
            'songLink' => $songLink,
            'songComment' => $songComment,
            'embeddedCode' => $embed
        ]);
    }
}

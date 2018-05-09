<?php

namespace App\Http\Controllers;

use Cohensive\Embed\Embed;
use Illuminate\Http\Request;
use App\Song;

class MusicController extends Controller
{
    /*
     *  GET SONGS
     */

     public function library()
     {
        $songs = Song::orderBy('song_id')->get();

        return view('music.library')->with([
            'songs' => $songs
        ]);
     }

    public function add(Request $request)
    {
        $this->validate($request, [
            'songName' => 'required|alpha_spaces',
            'artist' => 'required|alpha_spaces',
            'songLink' => 'required|active_url|is_youtube'
        ]);

        $songName = $request->input('songName');
        $artist = $request->input('artist');
        $songLink = $request->input('songLink');

        // check if song comment is empty to avoid SQL NULL error

        $songComment = '';

        if ($request->input('songComment') !== null)
        {
            $songComment = $request->input('songComment');
        }

        // make  embedded code  out of the original url

        $embed = 'test';

        // pull out the song id

        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $songLink, $embed))
        {
            $embed = $embed[1];
        }
        else
        {
            $embed = '';
        }

        // add song to database

        $song = new Song();
        $song->song_name = $songName;
        $song->artist = $artist;
        $song->song_url = $songLink;
        $song->song_id = $embed;
        $song->song_comment = $songComment;
        $song->save();

        // Save the song to the database...

        return view('music.add')->with([
            // add data to send here
            'songName' => $songName,
            'artist' => $artist,
            'songLink' => $songLink,
            'songComment' => $songComment,
            'embed' => $embed
        ]);
    }

    /*
     * Edit Book
     */
     public function edit($id)
     {
        $song = Song::find($id);

        // check if the song is actually there
        if (!$song)
        {
            return redirect('/library')->with([
                dump('book not found')
            ]);
        }

        // show the edit form
        return view('music.edit')->with([
            'song' => $song
        ]);
     }

     public function update(Request $request, $id)
     {
        // get the song we are going to update

        $song = Song::find($id);

         $this->validate($request, [
             'songName' => 'required|alpha_spaces',
             'artist' => 'required|alpha_spaces',
             'songLink' => 'required|active_url|is_youtube'
         ]);

         // check if song comment is empty to avoid SQL NULL error

         $songComment = '';

         if ($request->input('songComment') !== null)
         {
             $songComment = $request->input('songComment');
         }

         $songName = $request->input('songName');
         $artist = $request->input('artist');
         $songLink = $request->input('songLink');

         // make  embedded code  out of the original url

         $embed = 'test';

         // pull out the song id

         if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $songLink, $embed))
         {
             $embed = $embed[1];
         }
         else
         {
             $embed = '';
         }

         $song->song_name = $songName;
         $song->artist = $artist;
         $song->song_url = $songLink;
         $song->song_id = $embed;
         $song->song_comment = $songComment;
         $song->save();

         $updateMessage = 'Song ' . $songName . ' has been updated successfully';

         // go back to music library
         return view('music.edit')->with([
             'song' => $song,
             'updateMessage' => $updateMessage
         ]);
     }
}

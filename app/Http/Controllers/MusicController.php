<?php

namespace App\Http\Controllers;

use Cohensive\Embed\Embed;
use Illuminate\Http\Request;
use App\Song;
use App\Genre;
use Illuminate\Support\Facades\Input;

class MusicController extends Controller
{
    /*
     *  GET SONGS FOR LIBRARY
     */

    public function library()
    {
        $songs = Song::orderBy('id')->get();

        return view('music.library')->with([
            'songs' => $songs
        ]);
    }

    /*
     *  GET GENRES
     */

    public function genres()
    {
        $genres = Genre::orderBy('genre_name')->get();

        return view('music.genres')->with([
            'genres' => $genres,
        ]);
    }

    /*
    * ADD GENRES *** CURRENTLY NOT IN USE ***
    */

    public function addGenre(Request $request)
    {
        $this->validate($request, [
            'genreName' => 'required|alpha_spaces'
        ]);

        $genre = new Genre();

        $genre->genre_name = $request->genreName;

        $genre->save();

        // get Genres after update

        $genres = Genre::orderBy('genre_name')->get();

        return view('music.genres')->with([
            'genres' => $genres,
        ]);
    }

    /*
     * UPDATE GENRES *** CURRENTLY NOT IN USE ***
     */

    public function updateGenre(Request $request, $id)
    {
        $this->validate($request, [
            'genreName' => 'required|alpha_spaces',
        ]);

        $genre = Genre::find($id);

        if (Input::get('update')) {
            $genre->genre_name = $request->input('genreName');
            $genre->save();
        } else if (Input::get('delete')) {
            $genre->songs()->detach();

            $genre->delete();
        }

        // get Genres after update

        $genres = Genre::orderBy('genre_name')->get();

        return view('music.genres')->with([
            'genres' => $genres,
        ]);
    }

    /*
     * ADD SONG
     */

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

        if ($request->input('songComment') !== null) {
            $songComment = $request->input('songComment');
        }

        // make  embedded code  out of the original url

        $embed = 'test';

        // pull out the song id

        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $songLink, $embed)) {
            $embed = $embed[1];
        } else {
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

        $song->genres()->sync($request->input('genreIDs'));

        // get updated genres

        $songs = Song::orderBy('id')->get();

        // message when added

        $songAddedMessage = $songName . ' has been added to your library';

        return view('/music/library')->with([
            // add data to send here
            'songs' => $songs,
            'songAddedMessage' => $songAddedMessage
        ]);
    }

    /*
     * Edit Song
     */
    public function edit($id)
    {
        $song = Song::find($id);

        // check if the song is actually there
        if (!$song) {
            return redirect('/library')->with([
                dump('song not found')
            ]);
        }

        $genres = Genre::orderBy('genre_name')->get();

        return view('music.edit')->with([
            'song' => $song,
            'genres' => $genres
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

        if ($request->input('songComment') !== null) {
            $songComment = $request->input('songComment');
        }

        $songName = $request->input('songName');
        $artist = $request->input('artist');
        $songLink = $request->input('songLink');

        // make  embedded code  out of the original url

        $embed = 'test';

        // pull out the song id

        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $songLink, $embed)) {
            $embed = $embed[1];
        } else {
            $embed = '';
        }

        $song->song_name = $songName;
        $song->artist = $artist;
        $song->song_url = $songLink;
        $song->song_id = $embed;
        $song->song_comment = $songComment;
        $song->save();

        $song->genres()->sync($request->input('genreIDs'));

        $updateMessage = 'Song ' . $songName . ' has been updated successfully';

        $genres = Genre::orderBy('genre_name')->get();

        // return to view with current song and edit message
        return view('music.edit')->with([
            'song' => $song,
            'genres' => $genres,
            'updateMessage' => $updateMessage
        ]);
    }

    /*
     * Delete Song
     */
    public function delete(Request $request, $id)
    {
        $song = Song::find($id);

        $deleteMessage = 'song not found';

        // check if the song is actually there
        if (!$song) {
            return redirect('/library')->with([
                'deleteMessage' => $deleteMessage
            ]);
        }

        return view('music.delete')->with([
            'song' => $song,
            'deleteMessage' => $deleteMessage
        ]);
    }

    /*
     * Delete Song
     */
    public function kill(Request $request, $id)
    {
        $song = Song::find($id);

        $songName = $song->song_name;

        $deleteMessage = 'song not found';

        $songs = Song::orderBy('id')->get();

        if (Input::get('cancel')) {
            return view('music.library')->with([

                'songs' => $songs
            ]);
        } else if (Input::get('delete')) {
            // check if the song is actually there
            if (!$song) {
                return redirect('/music/library')->with([
                    'deleteMessage' => $deleteMessage
                ]);
            }

            $song->genres()->detach();

            $song->delete();

            $deleteMessage = $songName . ' has been deleted...';

            // get the remaining songs and pass them along to the library view

            $songs = Song::orderBy('id')->get();

            return view('music.library')->with([

                'deleteMessage' => $deleteMessage,
                'songs' => $songs
            ]);
        }
    }

}

<?php

use Illuminate\Database\Seeder;
use App\Song;
use App\Genre;

class GenreSongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            'Symphony No 1' => ['Classical','Folk, World, & Country'],
            'Symphony No 2' => ['Classical','Folk, World, & Country'],
            'Talk' => ['Electronic'],
            'Viva la Vida' => ['Electronic','Folk, World, & Country'],
            'Transatlanticism' => ['Electronic'],
            'Plans - Full Album' => ['Electronic'],
            'Give Up' => ['Electronic'],
            'Thank God Im a Country Boy' => ['Folk, World, & Country'],
            'Rocky Mountain High' => ['Folk, World, & Country'],
        ];

        foreach ($songs as $songName => $genres)
        {
            $song = Song::where('song_name', 'like', $songName)->first();

            foreach ($genres as $genreName)
            {
                $genre = Genre::where('genre_name', 'LIKE', $genreName)->first();

                $song->genres()->save($genre);
            }

        }

    }
}

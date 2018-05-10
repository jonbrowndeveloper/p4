<?php

use Illuminate\Database\Seeder;
use App\Genre;
use App\Song;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['Rock','Pop','Soundtrack','Blues','Brass & Military','Children','Classical','Electronic','Folk, World, & Country', 'Funk / Soul', 'Hip-Hop', 'Jazz', 'Latin'];

        foreach ($genres as $genreName)
        {
            $genre = new Genre();
            $genre->genre_name = $genreName;
            $genre->save();
        }
    }
}

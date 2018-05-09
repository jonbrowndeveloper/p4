<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['Blues','Brass & Military','Children','Classical','Electronic','Folk, World, & Country', 'Funk / Soul', 'Hip-Hop', 'Jazz', 'Latin', 'Pop','Raggae','Rock','Stage & Screen','Soundtrack'];

        foreach ($genres as $genreName)
        {
            $genre = new Genre();
            $genre->genre_name = $genreName;
            $genre->save();
        }
    }
}

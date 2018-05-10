<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_song', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('genre_id')->unsigned();
            $table->integer('song_id')->unsigned();

            $table->foreign('genre_id')->references('id')->on('songs');
            $table->foreign('song_id')->references('id')->on('genres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_song');
    }
}

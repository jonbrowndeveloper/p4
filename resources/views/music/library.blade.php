@extends('layouts.master')

@section('title')
    Library
@endsection

@section('content')

    @if (isset($deleteMessage))
        <div class='alert alert-success' role='alert'>
            {{ $deleteMessage }}
        </div>
    @endif

    @if (isset($songAddedMessage))
        <div class='alert alert-success' role='alert'>
            {{ $songAddedMessage }}
        </div>
    @endif
    <h1>Songs</h1>

    @if(isset($songs))
        @foreach($songs as $song)
            <div class='container-fluid'>
                <div class="row">
                    <div class="col-lg-4">
                        <iframe width="280"
                                height="158"
                                src="http://www.youtube.com/embed/{{$song->song_id}}"
                                allowfullscreen></iframe>
                    </div>
                    <div class="col-lg-4">
                        <h2>{{ $song->song_name }}</h2>
                        <h3>By: {{ $song->artist }}</h3>
                        <h4><i>{{ $song->song_comment }}</i></h4>
                    </div>
                    <div class="col-lg-4">
                        <a href='/songs/{{ $song->id }}/edit'
                           id='editButton{{ $song->id }}'
                           class='btn btn-primary'
                           role='button'>Edit</a>
                        <a href='/songs/{{ $song->id }}/delete'
                           id='deleteButton{{ $song->id }}'
                           class='btn btn-danger'
                           role='button'>Delete</a>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @endif

@endsection
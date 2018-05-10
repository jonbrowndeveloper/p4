@extends('layouts.master')

@section('title')
    Edit {{ $song->song_name }}
@endsection

@section('content')
    <h1>Are you sure you want to delete {{ $song->song_name }}</h1>

    <form method='POST' action='/songs/{{ $song->id }}/kill'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <button type="submit" name='cancel' value='cancel' class='btn btn-primary' role='button'>No Way!</button>
        <button type="submit" name='delete' value='delete' class='btn btn-danger' role='button'>Yes I'm Sure</button>
    </form>

@endsection
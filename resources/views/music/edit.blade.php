@extends('layouts.master')

@section('title')
    Edit {{ $song->song_name }}
@endsection

@section('content')
    <h1>Edit</h1>
    </br>
    <div class='container-fluid'>
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <form method='POST' action='/songs/{{ $song->id }}'>
                    {{ method_field('put') }}
                    {{ csrf_field() }}

                    @if (isset($updateMessage))
                        <div class='alert alert-success' role='alert'>
                            {{ $updateMessage }}
                        </div>
                    @endif

                    <div class='details'>* Required fields</div>

                    <br>
                    <label for='title'>* Song Name</label>
                    <input type="text" class="form-control" placeholder="Song Name" value='{{ $song->song_name }}' name='songName' id='songName'>
                    <br>
                    <label for='title'>* Artist</label>
                    <input type="text" class="form-control" placeholder="Artist Name" value='{{ $song->artist }}' name='artist' id='artist'>
                    <br>
                    <label for='title'>* Link</label>
                    <input type="text" class="form-control" placeholder="Youtube Link" value='{{ $song->song_url }}' name='songLink' id='songLink'>
                    <br>
                    <label for='title'>Comment</label>
                    <input type="text" class="form-control" placeholder="Add a comment about this music..." value='{{ $song->song_comment }}' name='songComment' id='songComment'>
                    <br>
                    <div class='container-fluid'>

                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                                <br>
                            @endforeach
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Update Song</button>
                </form>

            </div>
            <div class="col-lg-3">
            </div>
        </div>

    </div>
@endsection
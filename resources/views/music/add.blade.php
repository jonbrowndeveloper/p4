@extends('layouts.master')

@section('title')
    Add Song
@endsection

@section('content')
    <br>
    <div class='container-fluid'>
        <form method='POST' action='/library'>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5">
                    <h1>Add a Youtube link here!</h1>
                    <div class='details'>* Required fields</div>

                    <br>
                    <label for='songName'>* Song Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Song Name"
                           value='@if (isset($songName)){{ $songName }}@endif'
                           name='songName'
                           id='songName'>
                    <br>
                    <label for='artist'>* Artist</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Artist Name"
                           value='@if (isset($artist)){{ $artist }}@endif'
                           name='artist'
                           id='artist'>
                    <br>
                    <label for='songLink'>* Link</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Youtube Link"
                           value='@if (isset($songLink)){{ $songLink }}@endif'
                           name='songLink'
                           id='songLink'>
                    <br>
                    <label for='songComment'>Comment</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Add a comment about this music..."
                           value='@if (isset($songComment)){{ $songComment }}@endif'
                           name='songComment'
                           id='songComment'>
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
                    <button type="submit" class="btn btn-primary">Add Song</button>
                </div>
                <div class="col-lg-3">
                    <br>
                    <br>
                    <h4>Select Genres</h4>
                    <div class="control-group">
                        @if(isset($genres))
                            @foreach($genres as $key => $genre)
                                <label class="checkbox">
                                    <input type="checkbox"
                                           value="{{ $genre->id }}"
                                           name='genreIDs[]'
                                           id="{{ $genre->id }}CheckBox"> {{ $genre->genre_name }}
                                </label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </form>
    </div>
@endsection
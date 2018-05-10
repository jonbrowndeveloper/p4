@extends('layouts.master')

@section('title')
    Edit {{ $song->song_name }}
@endsection

@section('content')
    <br>
    <div class='container-fluid'>
        <form method='POST' action='/songs/{{ $song->id }}'>
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-5">
                    <h1>Edit</h1>


                    @if (isset($updateMessage))
                        <div class='alert alert-success' role='alert'>
                            {{ $updateMessage }}
                        </div>
                    @endif

                    <div class='details'>* Required fields</div>

                    <br>
                    <label for='songName'>* Song Name</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Song Name"
                           value='{{ $song->song_name }}'
                           name='songName'
                           id='songName'>
                    <br>
                    <label for='artist'>* Artist</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Artist Name"
                           value='{{ $song->artist }}'
                           name='artist'
                           id='artist'>
                    <br>
                    <label for='songLink'>* Link</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Youtube Link"
                           value='{{ $song->song_url }}'
                           name='songLink'
                           id='songLink'>
                    <br>
                    <label for='songComment'>Comment</label>
                    <input type="text"
                           class="form-control"
                           placeholder="Add a comment about this music..."
                           value='{{ $song->song_comment }}'
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


                    <button type="submit" class="btn btn-primary">Update Song</button>


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
                                           name='genreIDs[]'
                                           value="{{ $genre->id }}"
                                           id="CheckBox{{ $genre->id }}"
                                    @foreach ($song->genres as $genreInLoop)
                                        @if($genreInLoop->genre_name == $genre->genre_name)
                                            {{ 'checked' }}
                                            @endif
                                        @endforeach
                                    > {{ $genre->genre_name }}
                                </label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
        </form>
    </div>

    </div>
@endsection
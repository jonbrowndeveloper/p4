@extends('layouts.master')

@section('title')
    Genres
@endsection

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif

    <h1>Musical Genres</h1>

    <br>

    <div class='container-fluid'>
        <form method='POST' action='/genres/add'>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="Add Genre" name='genreName' id='genreName'>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-2">
                    <button type="submit" name='addButton' class='btn btn-primary' role='button'>Add Genre</button>
                </div>
            </div>
        </form>
    </div>

    <br>
    <hr>

    @if(isset($genres))
        @foreach($genres as $genre)
            <div class='container-fluid'>
                <form method='POST' action='/genres/{{ $genre->id }}'>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text"
                                   class="form-control"
                                   value='{{ $genre->genre_name }}'
                                   name='genreName'
                                   id='genreName'>
                        </div>
                        <div class="col-lg-6">
                        </div>
                        <div class="col-lg-2">
                            <button type="submit"
                                    name='update'
                                    value='Update'
                                    class='btn btn-primary'
                                    role='button'>Update
                            </button>
                            <button type="submit"
                                    name='delete'
                                    value='Delete'
                                    class='btn btn-danger'
                                    role='button'>Delete
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        @endforeach
    @endif

@endsection
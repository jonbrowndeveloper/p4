@extends('layouts.master')

@section('title')
    Add Song
@endsection

@section('content')
    <h1>Add a Youtube link here!</h1>
    </br>
    <div class='container-fluid'>
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <form method='POST' action='/library'>
                    {{ csrf_field() }}

                    <div class='details'>* Required fields</div>

                    <br>
                    <label for='title'>* Link</label>
                    <input type="text" class="form-control" placeholder="Youtube Link" @if (isset($songLink)){{ 'value=' . $songLink }}@endif name='songLink' id='songLink'>
                    <br>
                    <label for='title'>* Genre</label>
                    <input type="text" class="form-control" placeholder="What type of music is this?" @if (isset($songLink)){{ 'value=' . $songGenre }}@endif name='songGenre' id='songGenre'>
                    <br>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                                <br>
                            @endforeach
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Add Song</button>

                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option1"> Option 1
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option2"> Option 2
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="option3"> Option 3
                        </label>
                    </div>
                </form>

            </div>
            <div class="col-lg-3">
            </div>
        </div>

    </div>
@endsection
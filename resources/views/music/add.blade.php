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
                    <label for='title'>* Song Name</label>
                    <input type="text" class="form-control" placeholder="Song Name" value='@if (isset($songName)){{ $songName }}@endif' name='songName' id='songName'>
                    <br>
                    <label for='title'>* Artist</label>
                    <input type="text" class="form-control" placeholder="Artist Name" value='@if (isset($artist)){{ $artist }}@endif' name='artist' id='artist'>
                    <br>
                    <label for='title'>* Link</label>
                    <input type="text" class="form-control" placeholder="Youtube Link" value='@if (isset($songLink)){{ $songLink }}@endif' name='songLink' id='songLink'>
                    <br>
                    <label for='title'>Comment</label>
                    <input type="text" class="form-control" placeholder="Add a comment about this music..." value='@if (isset($songComment)){{ $songComment }}@endif' name='songComment' id='songComment'>
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

                </form>

                @if (isset($embeddedCode)){{ $embeddedCode }}@endif

                <iframe width="560" height="315" src="https://www.youtube.com/embed/Xb1ijVMk1Ys" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                
            </div>
            <div class="col-lg-3">
            </div>
        </div>

    </div>
@endsection
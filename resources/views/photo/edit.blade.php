@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@section('content')

    <div style="margin:2%">
        <form action="{{route('photos.store')}}" method="post">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">picture</label>
                    <input type="email" class="form-control"  value="{{$photo->name}}" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">explanation</label>
                    <input type="password" class="form-control" value="{{$photo->explanation}}" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">path</label>
                <input type="text" class="form-control" value="{{$photo->picture_path}}" placeholder="1234 Main St">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>
@endsection

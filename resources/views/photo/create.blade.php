@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@section('content')
    <div style="margin:2%">
        <form action="{{route('photos.store')}}" method="post">
@csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label >name</label>
                    <input type="text" name="name" class="form-control"   placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">explanation</label>
                    <input type="text" name="explanation" class="form-control"  placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">picture_path</label>
                <input type="text" name="picture_path" class="form-control"  placeholder="1234 Main St">
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

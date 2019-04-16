@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@section('content')
    <div style="margin:2%">
        <form action="{{route('photos.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>name</label>
                    <input type="text" name="name" class="form-control" placeholder="نامی برای عکس انتخاب کنید" value="{{old('name')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">explanation</label>
                    <input type="text" name="explanation" class="form-control"
                           placeholder="توضیحاتی راجع به عکس بنویسید" value="{{old('explanation')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">location</label>
                <input type="text" name="location" class="form-control" placeholder="مکان پست خود را وارد کنید"
                       value="{{old('picture_path')}}">
            </div>
            <button type="submit" class="btn btn-primary">ایجاد پست</button>

            <div class="form-group">

                <div style="position: relative ">
                    <a href="{{route('image.upload.post')}}">
                        <div style="background-color:#b8daff "> عکس خود را بار گذاری کنید</div>
                    </a>
                </div>
            </div>


        </form>
    </div>
@endsection

@extends('layouts.app')
{{--@if(auth()->user()->followings()->where('followers.follower_id', $user->id)->count())--}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@section('content')
    <div style="margin:2%">
        <form action="{{route('photos.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>name</label>
                    <input type="text" name="name" class="form-control" placeholder="نامی برای عکس انتخاب کنید"
                           value="{{old('name')}}">
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
                       value="{{old('location')}}">
            </div>

            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">ایجاد پست</button>

            {{--<div class="form-group">--}}

                {{--<div style="position: relative ">--}}
                    {{--<a href="{{route('image.upload.post')}}">--}}
                        {{--<div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">--}}
                            {{--<div class="btn-group mr-2" role="group" aria-label="First group">--}}
                                {{--<button type="button" class="btn btn-secondary" style="background-color :#1f648b;border-shadow:10%;  position: relative ;float: left">بارگذاری عکس</button>--}}

                                {{--<div style="background-color:#b8daff "></div>--}}
                            {{--</div>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}


        </form>
    </div>
@endsection
{{--@endif--}}
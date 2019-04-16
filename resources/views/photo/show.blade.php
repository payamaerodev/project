{{--@extends('layouts.app')--}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">

</script>
{{--@section('content')--}}
{{--<div style="margin:1%">--}}


{{--<table class="table table-bordered">--}}
{{--<thead>--}}
{{--<tr>--}}
{{--<th scope="col">شناسه</th>--}}
{{--<th scope="col">نام</th>--}}
{{--<th scope="col">ایمیل</th>--}}
{{--<th scope="col">تاریخ ایجاد</th>--}}

{{--</tr>--}}

{{--<tr>--}}


{{--</tr>--}}

{{--</thead>--}}
{{--<tr>--}}
{{--<th scope="row">{{$user->id}}</th>--}}
{{--<td>{{$user->name}}</td>--}}
{{--<td>{{$user->email}}</td>--}}
{{--<td>{{$user->created_at}}</td>--}}

{{--</tr>--}}
{{--<td colspan="4">--}}
{{--@foreach($photos as $photo)--}}
{{--<div class="post-item">--}}
{{--<img src="{{asset('images/' . $photo->picture_path)}}" alt="Smileyface" height="42" width="42">--}}
{{--<a href="{{route('like-post',['id'=>$photo->id])}}"><span class="like-post">❤</span></a>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</td>--}}

{{--</table>--}}
{{--</div>--}}
{{--@endsection--}}
<div class="justify-content-center col-md-4">
{{--<div class="card" style="width: 18rem;">--}}
    <td colspan="4">
    @foreach($photos as $photo)
    <div class="post-item">
        {{--$photo->picture_path--}}
    <img src="{{asset('images/' .$photo->picture_path)}}" alt="Smileyface" height="42%" width="42%">
    <a href="{{route('like-post',['id'=>$photo->id])}}"><span class="like-post">❤</span></a>
    </div>
    @endforeach
    </td>
    <div class="card-body">
        <h5 class="card-title">عکس پروفایل</h5>
        <p class="card-text">تصویر بالا متعلق است به خانم {{$user->name}}
            content.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{$user->id}}</li>
        <li class="list-group-item">{{$user->name}}</li>
        <li class="list-group-item">{{$user->email}}</li>
        <li class="list-group-item">{{$user->created_at}}</li>
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
</div>
{{--</div>--}}
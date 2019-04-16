@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@section('content')
    <div style="margin:1%">


        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">شناسه</th>
                <th scope="col">نام</th>
                <th scope="col">ایمیل</th>
                <th scope="col">تاریخ ایجاد</th>
                <th scope="col">دنبال کردن</th>
                <th scope="col">مسدود کردن</th>
                <th scope="col">دیدن پروفایل</th>
            </tr>
            @foreach($user as $person)

            </thead>
            <tr>
                <th scope="row">{{$person->id}}</th>
                <td>{{$person->name}}</td>
                <td>{{$person->email}}</td>
                <td>{{$person->created_at}}</td>
                <td><a href="{{ route('users.follow',$person->id)}}">Follow User</a></td>
                <td><a href="{{ route('users.unfollow',$person->id)}}">Block User</a></td>

                <td><a href="{{ route('photos.show', ['id' => $person->id])}}">Show Profile</a></td>

            </tr>


            @endforeach
        </table>
    </div>
@endsection

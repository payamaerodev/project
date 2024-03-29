@extends('layouts.app')
@section('content')
<div class="container">
    <table>
        <thead>
        <tr>
            <th scope="col">شناسه</th>
            <th scope="col">نام</th>
            <th scope="col">ایمیل</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col">دنبال کردن</th>
            <th scope="col">مسدود کردن</th>
            <th scope="col">دیدن پروفایل</th>
            <th scope="col">ایجاد تصویر پروقایل</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $person)
        <tr>
            <th scope="row">{{$person->id}}</th>
            <td>{{$person->name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->created_at}}</td>
            <td>
                <div><a href="{{ route('users.follow',$person->id)}}" class="button-blue"><i
                                class="fas fa-user-plus"></i></a>
                </div>

            </td>
            <td>
                <div><a href="{{ route('users.unfollow',$person->id)}}"><i class="fas fa-user-minus"></i></a>
            </td>

            <td><a href="{{ route('photos.show', ['id' => $person->id])}}"><i class="fas fa-user-circle"></i></a></td>


            @if($person->id==auth()->user()->id)
                <td><a href="{{ route('photos.create', ['id' => $person->id])}}"><i class="far fa-user-circle"></i></a>
                </td>
            @else
                <td><a href="#"><i class="far fa-user-circle"></i></a>
                </td>
            @endif

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
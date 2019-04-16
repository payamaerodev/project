@if(auth()->user()->followings()->where('followers.leader_id', $user->id)->count())
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">

    </script>

    <div class="justify-content-center col-md-4">
        <td colspan="4">
            @foreach($photos as $photo)
                <div class="post-item">
                    <img src="{{asset('images/' .$photo->picture_path)}}" alt="ProfilePicture" height="42%" width="42%">
                    <a href="{{route('like-post',['id'=>$photo->id])}}"><span class="like-post">❤</span></a>
                </div>
            @endforeach
        </td>
        <div class="card-body">
            <h5 class="card-title">عکس پروفایل</h5>
            <p class="card-text">تصویر بالا متعلق است به خانم {{$user->name}}
            </p>
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
@else
    <h3>شما یه این پست دسترسی ندارید</h3>  </br>
    برای دیدن این پست باید کاربر را دنبال کنید
@endif
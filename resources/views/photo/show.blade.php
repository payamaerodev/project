<div style="background-color:lightskyblue">
    @if(auth()->user()->followings()->where('followers.leader_id', $user->id)->count())


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">

        </script>



        <div class="justify-content-center col-md-4">
            @foreach($photos as $photo)
                <td colspan="4">

                    <div class="post-item">
                        <img src="{{asset($photo->picture_path)}}" alt="ProfilePicture" height="42%" width="42%">
                        </br> <a href="{{route('like-post',['id'=>$photo->id])}}"><span class="like-post">
                                {{--@dd($photo->likestatus)--}}
                                @if($photo->likestatus )
                                    <i class="far fa-heart"></i>
                                @else
                                    ❤
                                @endif</span></a>
                    </div>
                </td>
            @endforeach
            <form>
                <div class="form-group">
                    <label class="form-control">comment</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="توضیحاتی راجع به عکس بنویسید ">
                </div>


            </form>

            <label>توضیحات :</label>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" style="background-color:#1d75b3">
                    <div class="card-body">
                        <h5 class="card-title">عکس پروفایل</h5>
                        <p class="card-text">تصویر بالا متعلق است به خانم {{$user->name}}
                        </p>
                    </div>
                </li>
                <label>شناسه کاربر :</label>
                <li class="list-group-item" style="background-color: #1d75b3">{{$user->id}}</li>
                <label>نام کاربر :</label>
                <li class="list-group-item" style="background-color: #1d75b3">{{$user->name}}</li>
                <label>ایمیل کاربر :</label>
                <li class="list-group-item" style="background-color: #1d75b3">{{$user->email}}</li>
                <label>تاریخ ایجاد پروفایل :</label>
                <li class="list-group-item" style="background-color: #1d75b3">{{$user->created_at}}</li>
            </ul>

        </div>
    @else
        <h3>متاسفانه کاربر به شما اجازه ی دیدن عکس ها و پست ها را نمی دهد </h3>  </br>
        برای دیدن این پست باید کاربر را دنبال کنید
    @endif

</div>
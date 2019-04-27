@extends('layouts.app')
<div style="background-color:#62878c;justify-content: center">
    @if(
    auth()->id() == $user->id ||
    auth()->user()->followings()->where('followers.leader_id', $user->id)->count()
    )




        <div class="justify-content-center col-md-4">
            @foreach($photos as $photo)
                <td colspan="4">

                    <div class="post-item">
                        <img src="{{asset($photo->picture_path)}}" alt="ProfilePicture" height="85%" width="80%">
                        </br> <a href="{{route('like-post',['id'=>$photo->id])}}"><span class="like-post">
                            @if(!$photo->likes()->where('user_id',auth()->id())->first())
                                    <i class="far fa-heart"></i>
                                @else
                                    <i class="far fared-heart" style="background-color: red"></i>

                                    ❤
                                @endif
                            </span></a>
                        <div>{{$photo->likes()->count()}} likes</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="background-color:#b3d7ff;border-radius: 13%">
                                <div class="card-body" style="background-color:#b3d7ff;border-radius: 13%">
                                    <h5 class="card-title">عکس پروفایل</h5>
                                    <p class="card-text">تصویر بالا متعلق است به خانم {{$user->name}}
                                    </p>
                                </div>
                            </li>
                            <label>شناسه کاربر :</label>
                            <li class="list-group-item"
                                style="background-color: #78c0ff;border-radius: 13%">{{$user->id}}</li>
                            <label>نام کاربر :</label>
                            <li class="list-group-item"
                                style="background-color: #78c0ff;border-radius: 13%">{{$user->name}}</li>
                            <label>ایمیل کاربر :</label>
                            <li class="list-group-item"
                                style="background-color: #78c0ff;border-radius: 13%">{{$user->email}}</li>
                        </ul>

                    </div>
                </td>
                <label style="background-color:#62878c "><h4>Comments :</h4></label>
                @foreach($photo->comments as $comment)
                    <strong>
                        <div style="background-color: #5789a0;width: 30%">{{App\User::where('id',$comment->commenter_id)->first()->name}}</div>
                    </strong>
                    <label class="form-control">{{$comment->comment}}</label>
                    {{--**************************************************************************************--}}
                    {{--{{dd($comment)}}--}}
                    <div style="width: 50%;margin-left: 30%">
                        <form action="{{route('comment-reply',['id'=>$comment->id])}}" method="get">
                            @foreach($comment->replies as $reply)
                                <label class="form-control"
                                >{{$reply->reply}}</label>
                            @endforeach
                            <div class="form-group d-flex justify-content-between">

                                <input type="text" name=reply class="form-control"
                                       style="background-color:#b8daff" placeholder="به کامنت بالا پاسخ دهید ">
                                <button type="submit" class="btn btn-secondary btn-sm"><strong>post</strong>
                                </button>

                            </div>


                        </form>
                    </div>
                    {{--**************************************************************************************--}}



                @endforeach
                <form action="{{route('post-comment',['id'=>$photo->id])}}" method="get">
                    <div class="form-group">
                        <input type="text" name=comment class="form-control"
                               placeholder="توضیحاتی راجع به عکس بنویسید ">
                    </div>
                    <button type="submit" class="btn btn-info">post</button>


                </form>
            @endforeach


            <a href="{{route('users.index')}}" class="btn btn-dark">صفحه کاربران</a>


        </div>
    @else
        <h3>متاسفانه کاربر به شما اجازه ی دیدن عکس ها و پست ها را نمی دهد </h3>  </br>
        برای دیدن این پست باید کاربر را دنبال کنید
    @endif

</div>


@push('script')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">

</script>
@endpush

@push('script')
dsadasdsa
@endpush

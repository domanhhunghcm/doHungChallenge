@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="row justify-content-center" style="background-color: white;">
        <i class="fa fa-home" style="font-size: 52px;"></i>
    </div>

<div class="allBody">
        <div class="col-2 followList m-4">
            <h5> <i class="fa fa-address-book" style="font-size:30px"></i> Your followers:</h5>
        </div>
        <div class="col-7 postCenter">
            <div class="postStatus">
                <div class="profileUser justify-content-center">
                    <img src="{{ asset('img/profile/'.$userLogin->image) }}" alt="">
                </div>
                <button onclick="document.getElementById('id01').style.display='block'"  class="loginButton" >Hi {{$userLogin->first_name}}, what are you thinking now ?</button>

<div id="id01" class="modal">

  <form class="modal-content animate"">
    @csrf
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
        <h4 class="justify-content-center">Write post now: </h4>
        <input type="hidden" name="postUser" id="postUser" value="{{$userLogin->id}}">
      <textarea id="postContain" cols="30" name="postContain" rows="10" placeholder="&nbsp; Hi {{$userLogin->first_name}}, please write your mind now..."></textarea>
      <button type="submit" id="postForm" class="postForm btn btn-success btn-submit">Save</button>
    </div>
  </form>
</div>
            </div>
            <div class="userPost">
                @foreach ($postByUser as $post)
                <div class="onePost">
                    <div class="postHeader">
                        <div class="head-image profileUserOfPost">
                            <img src="{{ asset('img/profile/'.$post->user->image) }}" alt="">
                        </div>
                        <div class="head-name">
                            <div class="userName">
                                {{$post->user->first_name}}
                            </div>
                            <div class="statusPost">
                                Now <i class="fa fa-globe" style="font-size:24px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="postCenter">
                        {{$post->content_post}}
                    </div>
                    <div class="postFooter">
                        <div class="introduce-comment">
                            <div class="likePerson">
                                <p>Đỗ Hùng và những người khác</p>
                            </div>
                            <div class="commentNumber">
                                3 comment
                            </div>
                        </div>
                        <div class="comment-like">
                                <div class="likeProcess">
                                    <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Like!</b>
                                </div>
                                <div class="commentProcess">
                                    <i class="fa fa-comment" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Comment</b>
                                </div>
                        </div>
                        <div class="commentContent">
                            <div class="imageProfile profileUserOfPost">
                                <img src="http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-2_044126655.jpg" alt="">
                            </div>
                            <div class="nameAndComment">
                                <div class="nameImg">
                                    Dohung
                                </div>
                                <div class="userCommented">
                                    Comment naiyo
                                </div>
                            </div>
                        </div>
                        <div class="commentContent">
                            <div class="imageProfile profileUserOfPost">
                                <img src="{{ asset('img/profile/'.$userLogin->image) }}" alt="">
                            </div>
                            <div class="nameAndComment">
                                <form action="">
                                    <input type="hidden" placeholder="write your comment" class="commentUser">
                                    <input type="text" placeholder="write your comment" class="commentUser">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="onePost">
                    <div class="postHeader">
                        <div class="head-image profileUserOfPost">
                            <img src="http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-2_044126655.jpg" alt="">
                        </div>
                        <div class="head-name">
                            <div class="userName">
                                Nguyễn Thị Linh
                            </div>
                            <div class="statusPost">
                                Now <i class="fa fa-globe" style="font-size:24px"></i>
                            </div>
                        </div>
                    </div>
                    <div class="postCenter">
                        　自民党の安倍晋三・元首相（６７）が奈良市で参院選の街頭演説中に銃撃され、殺害された事件で、逮捕された山上徹也容疑者（４１）容疑者が奈良県警の調べに、特定の宗教団体の名前を挙げて「恨みがあった。団体のトップを狙うつもりだった」と供述していることが捜査関係者への取材でわかった。
                    </div>
                    <div class="postFooter">
                        <div class="introduce-comment">
                            <div class="likePerson">
                            </div>
                            <div class="commentNumber">
                                0 comment
                            </div>
                        </div>
                        <div class="comment-like">
                                <div class="likeProcess">
                                    <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Like!</b>
                                </div>
                                <div class="commentProcess">
                                    <i class="fa fa-comment" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Comment</b>
                                </div>
                        </div>
                        <div class="commentContent">
                            <div class="imageProfile profileUserOfPost">
                                <img src="http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-2_044126655.jpg" alt="">
                            </div>
                            <div class="nameAndComment">
                                <input type="text" placeholder="write your comment" class="commentUser">
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
        <div class="col-2 listUser">col-4</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript">

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $(".btn-submit").click(function(e){
        e.preventDefault();

// Get the modal
var modal = document.getElementById('id01');
modal.style.display = "none";
if ($("#postContain").val()!="") {
    $.ajax({
           type:'POST',
           url:"{{ route('create.post') }}",
           data:{postContain: jQuery('#postContain').val(),postUser: jQuery('#postUser').val(),"_token": $('#token').val()},
           success:function(data){
                // if($.isEmptyObject(data.error)){
                //     alert(data.success);
                //     location.reload();
                // }else{
                //     printErrorMsg(data.error);
                // }

                 $(".onePost").first().before(' <div class="onePost"><div class="postHeader"><div class="head-image profileUserOfPost"><img src="http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-2_044126655.jpg" alt=""></div><div class="head-name"><div class="userName"> Nguyễn Thị Linh </div><div class="statusPost"> Now <i class="fa fa-globe" style="font-size:24px"></i></div></div></div><div class="postCenter">'+$("#postContain").val()+'</div><div class="postFooter"><div class="introduce-comment"><div class="likePerson"></div><div class="commentNumber"> 0 comment </div></div><div class="comment-like"><div class="likeProcess"><i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Like!</b></div><div class="commentProcess"><i class="fa fa-comment" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Comment</b></div></div><div class="commentContent"><div class="imageProfile profileUserOfPost"><img src="http://thuthuatphanmem.vn/uploads/2018/09/11/hinh-anh-dep-2_044126655.jpg" alt=""></div><div class="nameAndComment"><input type="text" placeholder="write your comment" class="commentUser"></div></div></div></div>');
           }
        });
}


    });


    </script>
@endsection
@extends('layouts.app')

@section('content')
<div class="row justify-content-center" style="background-color: white;">
    <a href="/home"><i class="fa fa-home" style="font-size: 52px;color:black"></i></a>
 </div>
 <div class="allBody">
    {{-- proccess your follower --}}
    <div class="col-2 followList m-4 listUser left ">
       <h5> <i class="fa fa-users" aria-hidden="true"></i> Your followers:</h5>
       <hr>
       <div class="addFollowed">
       </div>
       @foreach($userLogin->followUser as $followedUser)
       <button type="button" class="followButton left">
          <div class="one-user left">
             <div class="imageProfile userFollow">
                <img src="{{ asset('img/profile/'.$followedUser->getUser->image) }}" alt="">
             </div>
             <span class="userListName">
             {{$followedUser->getUser->first_name}}
             </span>
             <div class="followIcon">
                <span class="badge badge-success">Following</span>
             </div>
          </div>
       </button>
       @endforeach
    </div>
    {{-- proccess post --}}
    <div class="col-7 postCenter">
       <div class="postStatus">
          <div class="profileUser justify-content-center">
             <img src="{{ asset('img/profile/'.$userLogin->image) }}" id="profileImage" alt="">
             <input type="hidden" value="{{$userLogin->first_name}}" id="profileName">
             <input type="hidden" value="{{$userLogin->id}}" id="idUser">
          </div>
        {{-- post button --}}
          <button onclick="document.getElementById('id01').style.display='block'"  class="loginButton" >Hi {{$userLogin->first_name}}, what are you thinking now ?</button>
          <div id="id01" class="modal">
             <div class="modal-content animate"">
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
             </div>
          </div>
       </div>
       {{-- list post --}}
       <div class="userPost">
          @foreach ($getPostByUser as $post)
          <div class="onePost">
             <div class="postHeader">
                <div class="head-image profileUserOfPost">
                   <img src="{{ asset('img/profile/'.$post->user->image) }}" alt="">
                </div>
                <div class="head-name">
                   <div class="userName">
                      {{$post->user->first_name}}
                   </div>
                    {{-- proccess time --}}
                   <div class="statusPost">
                      <?php
                         $olddate = $post->created_at;       //date as string
                         $now = time();                  //pick present time from server
                         $old = strtotime( $olddate);  //create integer value of old time
                         $diff =  $now-$old;             //calculate difference
                         $old = new DateTime($olddate);
                         $old = $old->format('Y M d');       //format date to "2015 Aug 2015" format

                             if ($diff /60 <1)                       //check the difference and do echo as required
                             {
                             echo intval($diff%60)."seconds ago";
                             }
                             else if (intval($diff/60) == 1)
                             {
                             echo " 1 minute ago";
                             }
                             else if ($diff / 60 < 60)
                             {
                             echo intval($diff/60)."minutes ago";
                             }
                             else if (intval($diff / 3600) == 1)
                             {
                             echo "1 hour ago";
                             }
                             else if ($diff / 3600 <24)
                             {
                             echo intval($diff/3600) . " hours ago";
                             }
                             else if ($diff/86400 < 30)
                             {
                             echo intval($diff/86400) . " days ago";
                             }
                             else
                             {
                             echo $old;  ////format date to "2015 Aug 2015" format
                             }
                         ?>
                      <i class="fa fa-globe" style="font-size:24px"></i>
                   </div>
                </div>
             </div>
             {{-- post center --}}
             <div class="postCenter">
                {{$post->content_post}}
             </div>
             <div class="postFooter">
                <div class="introduce-comment">
                   <div class="likePerson">
                      @if(count($post->like)>=3)
                      {{$post->like->first()->user->first_name}} và những người khác đã like
                      @elseif(count($post->like)==2)
                      @for ($i = 0; $i < sizeof($post->like); $i++)
                      @if($post->like[$i]->user->id==$userLogin->id)
                      you
                      @else
                      {{$post->like[$i]->user->first_name}}
                      @endif
                      @if($i==0)
                      ,
                      @else
                      @endif
                      @endfor
                      are liked
                      @else
                      @foreach($post->like as $like)
                      @if($like->user->id==$userLogin->id)
                      you are like
                      @else
                      {{$like->user->first_name}} is liked
                      @endif
                      @endforeach
                      @endif
                   </div>
                   <div class="commentNumber">
                      <span class="countNumberComment">
                      @if(count($post->comment)>0)
                      {{count($post->comment)}}
                      @else
                      0
                      @endif
                      </span> comment
                   </div>
                </div>
                 {{-- like comment --}}
                <div class="comment-like">
                   <div class="likeProcess">
                      @if(count($post->like)>=1)
                      @php ($setLike ="no")
                      @foreach($post->like as $likeCheck)
                      @if($likeCheck->user->id==$userLogin->id)
                      @php ($setLike ='yes')
                      <i class="fa fa-thumbs-up likeClass" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b class="likeClass">Like!</b>
                      <input type="hidden" class="commentUser userComment" name="userComment" value="{{$userLogin->id}}">
                      <input type="hidden" class="commentUser likeStatus" name="likeStatus" value="yes">
                      <input type="hidden" class="commentUser comment_post_id" name="comment_post_id"  value="{{$post->id}}">
                      <input type="hidden" class="countLike" name="countLike"  value="{{count($post->like)}}">
                      @else
                      @endif
                      @endforeach
                      @if($setLike=="no")
                      <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Like!</b>
                      <input type="hidden" class="commentUser userComment" name="userComment" value="{{$userLogin->id}}">
                      <input type="hidden" class="commentUser likeStatus" name="likeStatus" value="no">
                      <input type="hidden" class="commentUser comment_post_id" name="comment_post_id"  value="{{$post->id}}">
                      <input type="hidden" class="countLike" name="countLike"  value="{{count($post->like)}}">
                      @else
                      @endif
                      @else
                      <i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Like!</b>
                      <input type="hidden" class="commentUser userComment" name="userComment" value="{{$userLogin->id}}">
                      <input type="hidden" class="commentUser likeStatus" name="likeStatus" value="no">
                      <input type="hidden" class="commentUser comment_post_id" name="comment_post_id"  value="{{$post->id}}">
                      <input type="hidden" class="countLike" name="countLike"  value="{{count($post->like)}}">
                      @endif
                   </div>
                   <div class="commentProcess">
                      <i class="fa fa-comment" aria-hidden="true" style="font-size: 23px;"></i>&nbsp;<b>Comment</b>
                   </div>
                </div>
                @foreach ($post->comment as $comment)
                <div class="commentContent">
                   <div class="imageProfile profileUserOfPost">
                      <img src="{{ asset('img/profile/'.$comment->user->image) }}" alt="">
                   </div>
                   <div class="nameAndComment">
                      <div class="nameImg">
                         {{$comment->user->first_name}}
                      </div>
                      <div class="userCommented">
                         {{$comment->commentContent}}
                      </div>
                   </div>
                </div>
                @endforeach
                <div class="commentContent">
                   <div class="imageProfile profileUserOfPost">
                      <img src="{{ asset('img/profile/'.$userLogin->image) }}" alt="">
                   </div>
                   <div class="nameAndComment">
                      <input type="hidden" placeholder="write your comment" class="commentUser userComment" name="userComment" value="{{$userLogin->id}}">
                      <input type="hidden" class="commentUser comment_post_id" name="comment_post_id"  value="{{$post->id}}">
                      <input type="text" placeholder="write your comment" class="commentUser commentPost" name="commentPost">
                   </div>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </div>
    <div class="col-2 followList listUserRight m-4">
       <h5> <i class="fa fa-address-book" style="font-size:30px"></i> Contact list:</h5>
       <hr>
       @foreach($userNotFollow as $userProfile)
       <div class="noFollow">
          <button type="button" class="followButton" data-toggle="tooltip" data-placement="left" title="Click to follow">
             <div class="one-user">
                <div class="imageProfile userFollow">
                   <img class="imageUser" src="{{ asset('img/profile/'.$userProfile->image) }}" alt="">
                </div>
                <span class="userListName">
                {{$userProfile->first_name}}
                <input type="hidden" class="userListFollow" value="{{$userProfile->id}}">
                <input type="hidden" class="userFirstName" value="{{$userProfile->first_name}}">
                <img class="imageUserPro" style="display: none" src="{{ asset('img/profile/'.$userProfile->image) }}" alt="">
                </span>
                <div class="followIcon">
                   <i class="fa fa-check-square"></i>
                </div>
             </div>
          </button>
       </div>
       @endforeach
    </div>
 </div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function () {
   var imageSrc = $("#profileImage").attr("src");
   var first_nameUser = $("#profileName").val();
   var idUser = $("#idUser").val();
   $('.userPost').on('keyup', '.commentPost', function (e) {
      if (e.keyCode == 13) {
         e.preventDefault();
         var userComment = $(e.target).closest('.nameAndComment').find(".userComment").val();
         var commentPost = $(e.target).closest('.nameAndComment').find(".commentPost").val();
         var comment_post_id = $(e.target).closest('.nameAndComment').find(".comment_post_id").val();
         if ($(e.target).closest('.nameAndComment').find(".commentPost").val().trim() != "") {
            var request = new XMLHttpRequest();
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
            });
            $.ajax({
               type: 'POST',
               url: "{{route('create.comment')}}",
               data: {
                  userComment: userComment,
                  commentPost: commentPost,
                  comment_post_id: comment_post_id,
                  "_token": $('meta[name="csrf-token"]').attr('content'),
               },
               success: function (data) {
                  var afterComment = parseInt($(e.target).closest('.commentContent').closest(".postFooter").children(".introduce-comment").children(".commentNumber").children(".countNumberComment").text().trim()) + 1;
                  $(e.target).closest('.commentContent').closest(".postFooter").children(".introduce-comment").children(".commentNumber").children(".countNumberComment").text(afterComment);
                  $(e.target).closest('.commentContent').before('<div class="commentContent"><div class="imageProfile profileUserOfPost"><img src="' + imageSrc + '" alt=""></div><div class="nameAndComment"><div class="nameImg">' + first_nameUser + '</div><div class="userCommented">' + commentPost + '</div></div></div>');
                  $(e.target).val("");
               }
            });
         }
      }
   });
//user press like
   $('.userPost').on('click', '.likeProcess', function (e) {
      e.preventDefault();
      var userComment = $(e.target).closest('.comment-like').find(".userComment").val();
      var commentPostID = $(e.target).closest('.comment-like').find(".comment_post_id").val();
      var likeStatus = $(e.target).closest('.comment-like').find(".likeStatus").val();
      var countLike = $(e.target).closest('.comment-like').find(".countLike").val();
      var request = new XMLHttpRequest();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      if (likeStatus == "no") {
         if (countLike == 0) {
            $(e.target).closest('.postFooter').find(".likePerson").empty();
            $(e.target).closest('.postFooter').find(".likePerson").append("You are liked");
            $(e.target).closest('.comment-like').find(".countLike").val(1);
         } else {
            console.log($(e.target).closest('.postFooter').find(".likePerson"));
            $(e.target).closest('.postFooter').find(".likePerson").empty();
            $(e.target).closest('.postFooter').find(".likePerson").append("You and orther people liked");
            $(e.target).closest('.comment-like').find(".countLike").val($(e.target).closest('.comment-like').find(".countLike").val() + 1);
         }

         $(e.target).closest('.comment-like').find(".likeStatus").val("yes");
         $.ajax({
            type: 'POST',
            url: "{{route('create.addLike')}}",
            data: {
               userComment: userComment,
               commentPostID: commentPostID,
               "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
               $(e.target).closest('.comment-like').find(".likeProcess").css({
                  "color": "#001bff"
               });

            }
         });
      } else {
         if (countLike == 1) {
            $(e.target).closest('.postFooter').find(".likePerson").empty();
            $(e.target).closest('.comment-like').find(".countLike").val(0)
            $(e.target).closest('.comment-like').find(".likeProcess").css({
               "color": "black"
            });
            $(e.target).closest('.comment-like').find("i").removeClass("likeClass");
            $(e.target).closest('.comment-like').find("b").removeClass("likeClass");
         } else {
            $(e.target).closest('.comment-like').find(".countLike").val($(e.target).closest('.comment-like').find(".countLike").val(0) - 1);
            $(e.target).closest('.postFooter').find(".likePerson").empty();
            $(e.target).closest('.postFooter').find(".likePerson").append("Orther people liked");
            $(e.target).closest('.comment-like').find(".likeProcess").css({
               "color": "black"
            });
            $(e.target).closest('.comment-like').find("i").removeClass("likeClass");
            $(e.target).closest('.comment-like').find("b").removeClass("likeClass");
         }
         $(e.target).closest('.comment-like').find(".likeStatus").val("no");
         $.ajax({
            type: 'POST',
            url: "{{route('create.deleteLike')}}",
            data: {
               userComment: userComment,
               commentPostID: commentPostID,
               "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (data) {
               console.log($(e.target).closest('.comment-like').find(".likeProcess").css({
                  "color": "black"
               }));

            }
         });
      }

   })
//follow button press
   $(".followButton").click(function (e) {
      e.preventDefault();
      var reciveFollowID = $(e.target).closest(".noFollow").find('.userListFollow').val();
      var userDoFollow = idUser;
      var nameReciveFollow = $(e.target).closest(".noFollow").find('.userFirstName').val();
      var imgReciveFollow = $(e.target).closest(".noFollow").find('.imageUserPro').attr("src");
      var request = new XMLHttpRequest();
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         type: 'POST',
         url: "{{route('create.addFollow')}}",
         data: {
            userDoFollow: userDoFollow,
            reciveFollowID: reciveFollowID,
            "_token": $('meta[name="csrf-token"]').attr('content'),
         },
         success: function (data) {
            $(".addFollowed").after(' <button type="button" class="followButton left"><div class="one-user left"><div class="imageProfile userFollow"><img src="' + imgReciveFollow + '" alt=""></div><span class="userListName">' + nameReciveFollow + '</span><div class="followIcon"><span class="badge badge-success">Following</span></div></div></button>');
            $(e.target).closest(".noFollow").find('.followButton').parent().remove();
         }
      });
   })

//button save, save post
   $(".btn-submit").click(function (e) {
      e.preventDefault();
      // Get the modal
      var modal = document.getElementById('id01');
      modal.style.display = "none";
      if ($("#postContain").val().trim() != "") {
         $.ajax({
            type: 'POST',
            url: "{{ route('create.post') }}",
            data: {
               postContain: jQuery('#postContain').val(),
               postUser: jQuery('#postUser').val(),
               "_token": $('#token').val()
            },
            success: function (data) {
               if ($(".onePost").length > 0) {
                  $(".onePost").first().before('<div class="onePost"><div class="postHeader"><div class="head-image profileUserOfPost"><img src="' + imageSrc + '" alt=""></div><div class="head-name"><div class="userName">' + first_nameUser + '</div><div class="statusPost"> Now <i class="fa fa-globe" style="font-size:24px"></i></div></div></div><div class="postCenter">' + $("#postContain").val() + '</div><div class="postFooter"><div class="introduce-comment"><div class="likePerson"></div><div class="commentNumber"><span class="countNumberComment"> 0 </span> comment </div></div><div class="comment-like"><div class="likeProcess"><i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i> <b>Like!</b><input type="hidden" class="commentUser userComment" name="userComment" value="' + idUser + '"><input type="hidden" class="commentUser likeStatus" name="likeStatus" value="no"><input type="hidden" class="commentUser comment_post_id" name="comment_post_id" value="' + data["success"] + '"><input type="hidden" class="countLike" name="countLike" value="0"></div><div class="commentProcess"><i class="fa fa-comment" aria-hidden="true" style="font-size: 23px;"></i> <b>Comment</b></div></div><div class="commentContent"><div class="imageProfile profileUserOfPost"><img src="' + imageSrc + '" alt=""></div><div class="nameAndComment"><input type="hidden" placeholder="write your comment" class="commentUser userComment" name="userComment" value="' + idUser + '"><input type="hidden" class="commentUser comment_post_id" name="comment_post_id" value="' + data["success"] + '"><input type="text" placeholder="write your comment" class="commentUser commentPost" name="commentPost"></div></div></div></div>');
               } else {
                  $(".userPost").append('<div class="onePost"><div class="postHeader"><div class="head-image profileUserOfPost"><img src="' + imageSrc + '" alt=""></div><div class="head-name"><div class="userName">' + first_nameUser + '</div><div class="statusPost"> Now <i class="fa fa-globe" style="font-size:24px"></i></div></div></div><div class="postCenter">' + $("#postContain").val() + '</div><div class="postFooter"><div class="introduce-comment"><div class="likePerson"></div><div class="commentNumber"><span class="countNumberComment"> 0 Comment </div></div><div class="comment-like"><div class="likeProcess"><i class="fa fa-thumbs-up" aria-hidden="true" style="font-size: 23px;"></i> <b>Like!</b><input type="hidden" class="commentUser userComment" name="userComment" value="' + idUser + '"><input type="hidden" class="commentUser likeStatus" name="likeStatus" value="no"><input type="hidden" class="commentUser comment_post_id" name="comment_post_id" value="' + data["success"] + '"><input type="hidden" class="countLike" name="countLike" value="0"></div><div class="commentProcess"><i class="fa fa-comment" aria-hidden="true" style="font-size: 23px;"></i> <b>Comment</b></div></div><div class="commentContent"><div class="imageProfile profileUserOfPost"><img src="' + imageSrc + '" alt=""></div><div class="nameAndComment"><input type="hidden" placeholder="write your comment" class="commentUser userComment" name="userComment" value="' + idUser + '"><input type="hidden" class="commentUser comment_post_id" name="comment_post_id" value="' + data["success"] + '"><input type="text" placeholder="write your comment" class="commentUser commentPost" name="commentPost"></div></div></div></div>');
               }
               $("#postContain").val("");
            }
         });
      }
   });
});
    </script>
@endsection

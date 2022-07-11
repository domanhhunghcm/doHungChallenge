@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <div class="login-form">
                        <form enctype="multipart/form-data" style="position: relative" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="scaleHover setButtonX">
                                <a style="color:black" href="{{route("login")}}">X</a>

                            </div>
                            <h2 class="text-left">Sign up</h2>
                            <p class="text-left">It's quick and easy</p>
                            <hr>
                            <div class="form-group" style="width: 49%;float: left;">
                                <input id="first_name" placeholder="First name" type="text" class="set-border form-control @error('email') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" style="width: 49%;float: right;">
                                <input id="last_name" placeholder="Last name" type="text" class="set-border form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" placeholder="Mobile number or email" type="text" class="set-border form-control @error('email') is-invalid @enderror" name="email" required autocomplete="current-password">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" placeholder="Password" type="password" class="set-border form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <p>Image Profile Upload</p>
                                <input accept="image/*" type='file' id="imgInp"  class="form-control" name="imgInp"/>
                                <br>
                                <div class="uploadImage"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group"  style="display: flex;
                            align-items: center;
                            justify-content: center;">
                                <button type="submit"  style="width:58%;background-color: #36a420;border-color: #36a420;" class="set-border btn btn-primary btn-block">
                                    {{ __('Sign up') }}
                                </button>
                                <br>

                            </div>
                        </form>

                    </div>

                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
<script>
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    $(".uploadImage").empty();
    $(".uploadImage").append('<img id="blah" style="width:100%" src="'+URL.createObjectURL(file)+'" alt="your image" />');
  }
}
    </script>
@endsection

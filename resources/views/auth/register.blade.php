@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                {{-- <div class="card-body"> --}}
                    {{-- <form method="POST">


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form> --}}

                    <div class="login-form">
                        <form enctype="multipart/form-data" style="position: relative" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="scaleHover setButtonX">
                                X
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

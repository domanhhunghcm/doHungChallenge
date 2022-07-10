@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="login-form">
            <form action="{{ route('login') }}" method="post">
               @csrf
               <h2 class="text-left">Login</h2>
               <div class="form-group">
                  <input id="email" placeholder="Email or phone number" type="text" class="set-border form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                  <button type="submit" class="set-border btn btn-primary btn-block">
                  {{ __('Login') }}
                  </button>
                  <br>
                  <p class="text-center" style="display: flex;
                     align-items: center;
                     justify-content: center;"><a href="{{route("register")}}" style="width:58%;background-color: #36a420;border-color: #36a420;" class="set-border btn btn-primary btn-block">Create an Account</a></p>
               </div>
               <div class="clearfix">
                  <p class="float-right"><b>Create a Page </b> a celebrity, brand or business.</p>
               </div>
            </form>
         </div>
         {{--
      </div>
      --}}
      {{--
   </div>
   --}}
</div>
</div>
</div>
@endsection
@extends('layouts.general')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <img src="{{asset('/logo.jpg')}}" style="width: 150px !important;">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body mh-100">
      <p class="login-box-msg">{{ __('Register') }}</p>
  
      <form action="{{route('register')}}" method="post" class="form-element">
        @csrf
        <div class="form-group has-feedback">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus placeholder="{{ __('Name') }}">
            <span class="ion ion-email form-control-feedback"></span>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">
          <span class="ion ion-email form-control-feedback"></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password"  autocomplete="current-password" placeholder="{{ __('Password') }}">
          <span class="ion ion-locked form-control-feedback"></span>
          @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
          @enderror
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"  name="password_confirmation"  autocomplete="current-password" placeholder="{{ __('Password confirmation') }}">
            <span class="ion ion-locked form-control-feedback"></span>
            @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
            @enderror
          </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-info btn-block margin-top-10">{{ __('Register') }}</button>
            <a href="{{url('/login')}}" class="btn btn-warning btn-block margin-top-10">{{ __('Has account') }}</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection

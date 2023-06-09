@extends('layouts.general')

@section('content')
<div class="login-box">
  <div class="text-right">
    @foreach (config('locale', []) as $locale)
    @if ($locale != app()->getLocale())
        <a class="btn btn-primary" href="{{ route('locale.set', ['locale' => $locale]) }}">{{ strtoupper($locale) }}
        </a>
    @endif
  @endforeach
  </div>
    <div class="login-logo">
      <img src="{{asset('/logo.jpg')}}" style="width: 150px !important;">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body mh-100">
      <p class="login-box-msg">{{ __('general.Login') }}</p>
      <form action="{{route('login')}}" method="post" class="form-element">
        @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('general.Email Address') }}">
          <span class="ion ion-email form-control-feedback"></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password" placeholder="{{ __('general.Password') }}">
          <span class="ion ion-locked form-control-feedback"></span>
          @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-6">
            <div class="checkbox">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('general.Remember Me') }}
                </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
           <div class="fog-pwd">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="#">
                    {{ __('general.Forgot Your Password?') }}
                </a>
            @endif
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-info btn-block margin-top-10">{{ __('general.Login') }}</button>
            <a href="{{url('/register')}}" class="btn btn-warning btn-block margin-top-10">{{ __('general.Register') }}</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
@endsection

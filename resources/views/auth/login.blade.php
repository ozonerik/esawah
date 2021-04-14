@extends('layouts.app')
@push('styles')
@endpush
@section('content')
  <form class="form-signin" method="POST" action="{{ route('login') }}">
  @csrf
  <img class="mb-4" src="{{ asset('logo/esawah-logo.png') }}" alt="logo" style="width:45%">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="username" class="sr-only">Email address/ User Name</label>
  <input type="username" id="username-login" placeholder="Email address / User Name" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
  <label for="password" class="sr-only">Password</label>
  
  <div class="input-group mb-3">
    <input data-toggle="password" type="password" id="password-login" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <div class="input-group-append" >
      <span class="input-group-text" id="password-login" ><i class="fa fa-eye"></i></span>
    </div>
  </div>
  <div class="checkbox mb-3">
    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

    <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
  </div>
  @guest
    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
    @if (Route::has('register'))
      <a class="btn btn-link btn-block text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
    @if (Route::has('password.request'))
      <a class="btn btn-link text-light" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
      </a>
    @endif
  @endguest
  <p class="mt-5 mb-3">{{ myapp()['version'] }}</p>
</form>
@endsection
@push('scripts')

@endpush
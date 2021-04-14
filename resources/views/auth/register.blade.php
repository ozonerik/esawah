@extends('layouts.app')
@push('styles')

@endpush
@section('content')
<!-- -->
<form class="form-signin" method="POST" action="{{ route('register') }}">
  @csrf
  <img class="mb-4" src="{{ asset('logo/esawah-logo.png') }}" alt="logo" style="width:45%">
  <h1 class="h3 mb-3 font-weight-normal">{{ __('Register') }}</h1>
  
  <label for="name" class="col-form-label text-light d-block text-md-left  text-center mx-2">{{ __('Name') }}</label>
  <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
  
  <label for="username" class="col-form-label text-light d-block text-md-left  text-center mx-2">{{ __('Username') }}</label>
  <input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

  <label for="email" class="col-form-label text-light d-block text-md-left  text-center mx-2">{{ __('E-Mail Address') }}</label>
  <input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

  <label for="password" class="col-form-label text-light d-block text-md-left  text-center mx-2">{{ __('Password') }}</label> 
  <div class="input-group">
    <input data-toggle="password" id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-eye"></i></span>
    </div>
  </div>
  
  <label for="password-confirm" class="col-form-label text-light d-block text-md-left  text-center mx-2">{{ __('Confirm Password') }}</label> 
  <div class="input-group mb-5">
    <input data-toggle="password" id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    <div class="input-group-append">
      <span class="input-group-text"><i class="fa fa-eye"></i></span>
    </div>
  </div>
  
  @guest
    <button type="submit" class="btn btn-primary btn-block">
        {{ __('Register') }}
    </button>
  @endguest
  <a class="btn btn-link btn-block text-light" href="/">{{ __('Back to login') }}</a>
  <p class="mt-5 mb-3">{{ myapp()['version'] }}</p>
</form>
<!-- -->
@endsection
@push('scripts')

@endpush

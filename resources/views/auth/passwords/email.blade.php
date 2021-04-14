@extends('layouts.app')
@push('styles')
@endpush
@section('content')
<!-- -->
<form class="form-signin" method="POST" action="{{ route('password.email') }}">
  @csrf
  <img class="mb-4" src="{{ asset('logo/esawah-logo.png') }}" alt="logo" style="width:45%">
  <h1 class="h3 mb-3 font-weight-normal">{{ __('Reset Password') }}</h1>
  
  <label for="name" class="col-form-label text-light d-block text-md-left  text-center mx-2">{{ __('E-Mail Address') }}</label>
  <input id="email" type="email" class="form-control mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

  @guest
    <button type="submit" class="btn btn-primary btn-block">
        {{ __('Send Password Reset Link') }}
    </button>
  @endguest
  <a class="btn btn-link btn-block text-light" href="{{ route('login') }}">{{ __('Back') }}</a>
  <p class="mt-5 mb-3">{{ myapp()['version'] }}</p>
</form>
<!-- -->
@endsection
@push('scripts')

@endpush

@extends('layouts.back')
@push('styles')

@endpush
@section('content')
<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">	
@csrf
<div class="card">
  <div class="card-header">{{ __('Verify Your Email Address') }}</div>

  <div class="card-body">
    <div class="row mb-3">
      <div class="col-md-8">
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}
      </div>
    </div>
    <div class="row"> 
      <div class="col-md-8 text-center text-md-left">
        <button type="submit" class="btn btn-primary"> {{ __('click here to request another') }}</button>   
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@push('scripts')

@endpush
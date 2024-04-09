
@extends('layouts.app')

@section('content')
  <div class="welcome d-flex align-items-center justify-content-center">
    <div class="text-center">
      <h1>Store Your Contacts Now</h1>
      <a class="btn btn-lg btn-dark" href="{{ route('login') }}">Get Started</a>
    </div>
  </div>
@endsection

@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">Login</div>
      <div class="card-body">
        @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ url('/') }}">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="mt-3 text-center">
          <a href="{{ url('/register') }}">Register an account</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

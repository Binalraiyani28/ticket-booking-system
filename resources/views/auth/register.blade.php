@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card shadow-sm">
      <div class="card-header bg-success text-white">Register</div>
      <div class="card-body">
        <form method="POST" action="{{ url('/register') }}">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
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
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
          </div>
          <button type="submit" class="btn btn-success btn-block">Register</button>
        </form>
        <div class="mt-3 text-center">
          <a href="{{ url('/') }}">Already have an account? Login</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

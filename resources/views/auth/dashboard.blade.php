@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="text-center">
    <h2>Welcome, {{ $user->name }}</h2>
    <p class="lead">Here you can view events, book tickets, and see your booking history.</p>
    <a href="{{ url('/events') }}" class="btn btn-primary">View Events</a>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Booking History')

@section('content')
<h2>My Booking History</h2>

<div class="events-container">
    @forelse ($bookings as $booking)
    <div class="event-card">
        <div class="event-card-header">
            <h3>{{ $booking->event->name }}</h3>
        </div>
        <div class="event-card-body">
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->event->date)->format('F j, Y') }}</p>
            <p><strong>Venue:</strong> {{ $booking->event->venue }}</p>
            <p><strong>Booked At:</strong> {{ $booking->created_at->format('F j, Y, g:i A') }}</p>
        </div>
    </div>
    @empty
    <p>You have no bookings yet.</p>
    @endforelse
</div>

<div class="mt-3">
    {{ $bookings->links('pagination::bootstrap-5') }}
</div>
@endsection

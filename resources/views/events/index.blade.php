@extends('layouts.app')

@section('title', 'Event Listings')

@section('content')
<h2>Upcoming Events</h2>

<div class="events-container">
    @foreach($events as $event)
    <div class="event-card">
        <div class="event-card-header">
            <h3>{{ $event->name }}</h3>
        </div>
        <div class="event-card-body">
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
            <p><strong>Venue:</strong> {{ $event->venue }}</p>
            <p><strong>Available Seats:</strong> <span id="seats-{{ $event->id }}">{{ $event->available_seats }}</span></p>
        </div>
        <div class="event-card-footer">
            <button class="book-button" data-event-id="{{ $event->id }}">Book Ticket</button>
            <p id="success-message-{{ $event->id }}" style="display: none; color: green;"></p>
            <p id="error-message-{{ $event->id }}" style="display: none; color: red;"></p>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        console.log("start--");

        $('.book-button').click(function() {
            console.log("start ------");

            var eventId = $(this).data('event-id');

            $.ajax({
                url: '/events/book/' + eventId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        $('#seats-' + eventId).text(response.available_seats);
                        $('#success-message-' + eventId).text(response.message).show();
                        $('#error-message-' + eventId).hide();

                        setTimeout(function() {
                            $('#success-message-' + eventId).fadeOut();
                        }, 3000);
                    } else {
                        $('#error-message-' + eventId).text(response.message).show();
                        $('#success-message-' + eventId).hide();
                        setTimeout(function() {
                            $('#error-message-' + eventId).fadeOut();
                        }, 3000);
                    }
                },
                error: function() {
                    $('#error-message-' + eventId).text('Something went wrong. Please try again.').show();
                    $('#success-message-' + eventId).hide();
                    setTimeout(function() {
                        $('#error-message-' + eventId).fadeOut();
                    }, 3000);
                }
            });
        });
    });
</script>
@endsection

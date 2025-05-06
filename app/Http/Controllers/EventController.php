<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\AuthSession;
use App\Models\Event;
use App\Models\Booking;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.session');
    }

    public function index()
    {
        // Fetch 3-5 events from the database
        $events = Event::limit(6)->get();
        return view('events.index', compact('events'));
    }

    public function bookTicket(Request $request, $eventId)
    {
        $event = Event::find($eventId);

        // Check if there are available seats
        if ($event->available_seats > 0) {
            // Reduce available seats
            $event->decrement('available_seats');

            // Store booking in the database
            Booking::create([
                'user_id' => session('user_id'),  // Assuming user is logged in
                'event_id' => $event->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your ticket has been booked successfully!',
                'available_seats' => $event->available_seats,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, no available seats for this event.',
            ]);
        }
    }

    public function history()
    {
        $userId = session('user_id');

        $bookings = \App\Models\Booking::with('event')
            ->where('user_id', $userId)
            ->latest()
            ->paginate(6); 

        return view('bookings.history', compact('bookings'));
    }
}

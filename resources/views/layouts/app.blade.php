<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ticket Booking')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ url('/') }}">TicketBooking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if(session('user_id'))
                <li class="nav-item"><a class="nav-link text-white font-weight-bold" href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link text-white font-weight-bold" href="{{ url('/bookings') }}">Booking History</a></li>
                <li class="nav-item"><a class="nav-link text-white font-weight-bold" href="{{ url('/logout') }}">Logout</a></li>
                @else
                <li class="nav-item"><a class="nav-link text-white font-weight-bold" href="{{ url('/') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link text-white font-weight-bold" href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul>

        </div>
    </nav>

    <main class="container my-5">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3">
        <div class="container">
            <small class="text-muted">&copy; {{ date('Y') }} Ticket Booking System</small>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Page-specific JS --}}
    @yield('scripts')
</body>

</html>

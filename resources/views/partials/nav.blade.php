<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Hotel Booking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.hotels.index') }}">Manage Hotels</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bookings.index') }}">Manage Bookings</a>
                        </li>
                    @elseif(Auth::user()->role === 'user')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.bookings.index') }}">My Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.bookings.create') }}">Book a Hotel</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <span class="nav-link">Hello, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="display: inline; cursor: pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
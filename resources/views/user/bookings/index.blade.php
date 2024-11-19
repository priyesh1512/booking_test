@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Bookings</h1>
    @if($bookings->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hotel</th>
                    <th>Location</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Guests</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->hotel->name }}</td>
                        <td>{{ $booking->hotel->location }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>
                        <td>{{ $booking->guests }}</td>
                        <td>
                            <a href="{{ route('user.bookings.show', $booking) }}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have no bookings.</p>
    @endif
</div>
@endsection
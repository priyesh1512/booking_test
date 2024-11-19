@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    <p><strong>Hotel:</strong> {{ $booking->hotel->name }}</p>
    <p><strong>Location:</strong> {{ $booking->hotel->location }}</p>
    <p><strong>Price per Night:</strong> ${{ number_format($booking->hotel->price, 2) }}</p>
    <p><strong>Check-In:</strong> {{ $booking->check_in }}</p>
    <p><strong>Check-Out:</strong> {{ $booking->check_out }}</p>
    <p><strong>Guests:</strong> {{ $booking->guests }}</p>
    <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">Back to Bookings</a>
</div>
@endsection
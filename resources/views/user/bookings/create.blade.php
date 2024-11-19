@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Booking</h1>
    <form id="booking-form" action="{{ route('user.bookings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="hotel_id" class="form-label">Select Hotel</label>
            <select class="form-select" id="hotel_id" name="hotel_id" required>
                <option value="">Choose...</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}" {{ old('hotel_id') == $hotel->id ? 'selected' : '' }}>
                        {{ $hotel->name }} - ${{ number_format($hotel->price, 2) }}
                    </option>
                @endforeach
            </select>
            @error('hotel_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="check_in" class="form-label">Check-In Date</label>
            <input type="date" class="form-control" id="check_in" name="check_in" value="{{ old('check_in') }}" required>
            @error('check_in')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="check_out" class="form-label">Check-Out Date</label>
            <input type="date" class="form-control" id="check_out" name="check_out" value="{{ old('check_out') }}" required>
            @error('check_out')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" id="guests" name="guests" value="{{ old('guests') }}" min="1" required>
            @error('guests')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div id="availability-message" class="mb-3"></div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    const bookingForm = document.getElementById('booking-form');

    bookingForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const hotelId = document.getElementById('hotel_id').value;
        const checkIn = document.getElementById('check_in').value;
        const checkOut = document.getElementById('check_out').value;

        if (!hotelId || !checkIn || !checkOut) {
            alert('Please fill all required fields.');
            return;
        }

        fetch(`{{ route('hotels.checkAvailability') }}?hotel_id=${hotelId}&check_in=${checkIn}&check_out=${checkOut}`)
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('availability-message');
                const submitButton = bookingForm.querySelector('button[type="submit"]');
                if (data.available) {
                    messageDiv.innerHTML = '<div class="alert alert-success">Rooms are available!</div>';
                    submitButton.disabled = false;
                    // Optionally proceed to submit
                    bookingForm.submit();
                } else {
                    messageDiv.innerHTML = '<div class="alert alert-danger">No rooms available for the selected dates.</div>';
                    submitButton.disabled = true;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while checking availability.');
            });
    });
</script>
@endsection
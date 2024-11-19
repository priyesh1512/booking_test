@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>All Bookings</h1>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Refresh</a>
</div>

@if($bookings->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Hotel</th>
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
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->hotel->name }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td>{{ $booking->guests }}</td>
                    <td>
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No bookings found.</p>
@endif
@endsection
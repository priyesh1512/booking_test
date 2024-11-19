@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Hotels</h1>
    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Add New Hotel</a>
</div>

{{-- Search and Filter Form --}}
<form method="GET" action="{{ route('admin.hotels.index') }}" class="mb-4">
    <div class="row g-2">
        <div class="col-md-3">
            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request('location') }}">
        </div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="price_min" class="form-control" placeholder="Min Price" value="{{ request('price_min') }}">
        </div>
        <div class="col-md-3">
            <input type="number" step="0.01" name="price_max" class="form-control" placeholder="Max Price" value="{{ request('price_max') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-secondary">Search</button>
            <a href="{{ route('admin.hotels.index') }}" class="btn btn-link">Clear</a>
        </div>
    </div>
</form>

@if($hotels->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Price per Night</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->location }}</td>
                    <td>${{ number_format($hotel->price, 2) }}</td>
                    <td>
                        <a href="{{ route('admin.hotels.edit', $hotel) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('admin.hotels.show', $hotel) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('admin.hotels.destroy', $hotel) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this hotel?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No hotels found.</p>
@endif
@endsection
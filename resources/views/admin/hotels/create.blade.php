@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Hotel</h1>
    <form action="{{ route('admin.hotels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Hotel Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" required>
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price per Night</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Add other fields as necessary --}}
        <button type="submit" class="btn btn-primary">Create Hotel</button>
    </form>
</div>
@endsection
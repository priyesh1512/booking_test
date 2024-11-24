@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin: 40px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h1 style="color: #2c3e50; text-align: center; margin-bottom: 30px;">Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Optionally add Remember Me --}}
        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; background-color: #3498db; border: none; font-weight: bold; margin-top: 20px;">Login</button>
    </form>
</div>
@endsection
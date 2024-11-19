@extends('layouts.app')

@section('content')
<div class="container">
    <h1>404 - Not Found</h1>
    <p>The page you are looking for does not exist.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
</div>
@endsection

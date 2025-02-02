@extends('layouts.master')

@section('title', 'Unauthorized')

@section('content')
<div class="container">
    <h1>Unauthorized Access</h1>
    <p>You do not have permission to access this page.</p>
    <a href="{{ url('/') }}">Go to Home</a>
</div>
@endsection
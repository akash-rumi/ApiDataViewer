@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Welcome to LaravelDataHub</h1>
    <p class="lead">Your one-stop solution for fetching and displaying data from various APIs.</p>
    <hr>
    <p>Explore our features:</p>
    <ul>
        <li><a href="{{ route('posts-typicode.index') }}">Posts from JSONPlaceholder (Typicode)</a></li>
        <li><a href="{{ route('posts-placeholder.index') }}">Posts from Placeholder.org</a></li>
    </ul>
</div>
@endsection

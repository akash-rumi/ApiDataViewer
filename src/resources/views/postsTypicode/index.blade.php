<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <x-posts-table 
        :posts="$posts" 
        :headers="['ID','User','Title','Body']" 
        :columns="['id','user_id','title','body']" 
        :toggleColumn="'body'" />
@endsection

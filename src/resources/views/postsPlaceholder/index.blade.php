@extends('layouts.app')
@section('content')
    <h1>Placeholder.org Posts</h1>
    <x-posts-table 
        :posts="$posts" 
        :headers="['ID','Title','Category','Status','Published','User']" 
        :columns="['id','title','category','status','published_at','user_id']" 
        :linkColumn="'title'" 
        :linkRoute="'posts-placeholder.show'" />
@endsection

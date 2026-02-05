@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">{{ $post->title }}</h1>

    <!-- Meta info -->
    <div class="mb-4 d-flex flex-wrap gap-3 align-items-center">
        <span class="badge bg-primary text-uppercase">{{ $post->category }}</span>
        <span class="badge {{ $post->status === 'published' ? 'bg-success' : 'bg-warning' }}">{{ ucfirst($post->status) }}</span>
        <small class="text-muted"><i class="bi bi-calendar"></i> <strong>Published:</strong> {{ $post->published_at }}</small>
        <small class="text-muted"><i class="bi bi-person"></i> <strong>Author ID:</strong> {{ $post->user_id }}</small>
    </div>

    <!-- Image -->
    @if($post->image)
        <div class="mb-4">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid rounded">
        </div>
    @endif

    <!-- Content -->
    <div class="mb-4">
        <p class="lead">{{ $post->content }}</p>
    </div>

    <!-- Thumbnail -->
    @if($post->thumbnail)
        <div class="mt-4">
            <h5>Thumbnail</h5>
            <img src="{{ $post->thumbnail }}" alt="Thumbnail" class="img-thumbnail">
        </div>
    @endif

    <!-- Next/Previous button -->
    <div class="mt-4">
        @if($previous = \App\Models\PostPlaceholderOrg::where('id', '<', $post->id)->orderBy('id', 'desc')->first())
            <a href="{{ route('posts-placeholder.show', $previous->id) }}" class="btn btn-outline-secondary">← Previous Post</a>
        @endif
        @if($next = \App\Models\PostPlaceholderOrg::where('id', '>', $post->id)->orderBy('id', 'asc')->first())
            <a href="{{ route('posts-placeholder.show', $next->id) }}" class="btn btn-outline-secondary float-end">Next Post →</a>
        @endif
    </div>
</div>
@endsection
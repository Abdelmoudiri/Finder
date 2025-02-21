@extends('layouts')
@section('title','Annonces Details')
@section('content')

<div class="container mt-4">
    
    <!-- Annonces Card -->
    <div class="card mb-4 hover-shadow transition-all">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h3 class="h5 card-title text-primary mb-0">{{ $annonces->titre }}</h3>
                <span class="badge rounded-pill {{ $annonces->type === 'perdu' ? 'bg-danger' : 'bg-success' }}">
                    {{ ucfirst($annonces->type) }}
                </span>
            </div>
            <p class="card-text">{{ $annonces->description }}</p>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted small">
                    <i class="fas fa-map-marker-alt me-1"></i>
                    {{ $annonces->lieu }}
                </div>
                <div class="text-muted small">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ \Carbon\Carbon::parse($annonces->date)->format('d/m/Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="card">
        <div class="card-header bg-light">
            <h4 class="mb-0">Comments</h4>
        </div>
        <div class="card-body">
            <!-- Add Comment Form -->
            @auth
            <form action="{{ route('comments.store', $annonces->id) }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="content" rows="3" placeholder="Write your comment here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
            @else
            <div class="alert alert-info">
                <a href="{{ route('login') }}" class="text-decoration-none">Login</a> to leave a comment.
            </div>
            @endauth
    
            <!-- Comments List -->
            <div class="comments-list">
                @forelse($annonces->comments ?? [] as $comment)
                <div class="comment-item border-bottom py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user-info">
                            <strong>{{ $comment->user->name }}</strong>
                            <small class="text-muted ms-2">
                                {{ $comment->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                    <p class="mb-0 mt-2">{{ $comment->content }}</p>
                </div>
                @empty
                <p class="text-muted text-center">No comments yet. Be the first to comment!</p>
                @endforelse
            </div>
        </div>
    </div>
    

<style>
.comment-item:last-child {
    border-bottom: none !important;
}
.hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}
</style>

@endsection
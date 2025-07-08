@extends('frontend.layouts.main')
@section('title', $blog->title . ' | ResellZone')

@section('main-container')
 <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins';margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Blog
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
                                    <span style="color: white;">> Details</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Blog Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <!-- Title -->
                    <h1 class="card-title mb-3" style="font-weight: 600;">{{ $blog->title }}</h1>

                    <!-- Publish Date -->
                    <p class="text-muted small">Published on {{ $blog->created_at->format('F d, Y') }}</p>

                    <!-- Image -->
                    @if($blog->image)
                        <div class="text-center my-4">
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="img-fluid rounded"
                                 style="max-height: 400px; object-fit: cover; border-radius: 12px;">
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="blog-content" style="line-height: 1.8; font-size: 1.05rem; color: #333;">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>
            </div>

            <!-- Like / Dislike Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <form action="{{ route('blog.like', $blog->id) }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-success btn-sm">
                        👍 Like ({{ $blog->likes_count ?? 0 }})
                    </button>
                </form>

                <form action="{{ route('blog.dislike', $blog->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        👎 Dislike ({{ $blog->dislikes_count ?? 0 }})
                    </button>
                </form>
            </div>

            <!-- Comment Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Leave a Comment</h5>
                    <form action="{{ route('blog.comment', $blog->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="comment" class="form-control" rows="3" placeholder="Your comment..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Comments ({{ $blog->comments->count() }})</h5>

                    @forelse($blog->comments as $comment)
                        <div class="mb-3 border-bottom pb-2">
                            <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                            <small class="text-muted"> - {{ $comment->created_at->diffForHumans() }}</small>
                            <p class="mt-1 mb-0">{{ $comment->comment }}</p>
                        </div>
                    @empty
                        <p class="text-muted">No comments yet. Be the first to comment!</p>
                    @endforelse
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-5">
                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                    ← Back to Blog
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

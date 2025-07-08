@extends('frontend.layouts.main')
@section('title', 'Blog | ResellZone')

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
                            Blogs
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container py-5">
    <h2 class="mb-5 text-center" style="font-weight: 600; font-family: 'Poppins', sans-serif;">
        Latest Insights & Updates
    </h2>

    <div class="row g-4">
        @forelse($blogs as $blog)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm blog-card transition-all">

                    @if($blog->image)
                        <img 
                            src="{{ asset('storage/' . $blog->image) }}" 
                            alt="{{ $blog->title }}" 
                            class="card-img-top rounded-top" 
                            loading="lazy"
                            style="height: 200px; object-fit: cover;"
                        >
                    @endif

                    <div class="card-body d-flex flex-column">
                        <small class="text-muted d-block mb-2">
                            {{ $blog->created_at->format('F d, Y') }}
                        </small>

                        <h5 class="card-title mb-2" style="font-weight: 600;">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($blog->title, 60) }}
                            </a>
                        </h5>

                        <p class="card-text text-muted mb-4">
                            {{ Str::limit($blog->excerpt, 100) }}
                        </p>

                        <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-sm btn-primary mt-auto align-self-start">
                            Read More →
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                <p>No blog posts available right now. Please check back soon.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $blogs->links() }}
    </div>
</div>
@endsection

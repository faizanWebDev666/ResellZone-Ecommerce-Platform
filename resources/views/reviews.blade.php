@extends('frontend.layouts.OnlyHeader')

@section('main-container')

    <!-- Banner Section -->
    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; text-align: center;">
        <div class="inner-breadcrumb" style="background: #0db893; padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins', sans-serif; margin-bottom: 20px;">
                            Your Reviews
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white;">
                                <li class="breadcrumb-item">
                                    <a href="/" style="color: #ffd700; text-decoration: none; font-weight: bold;">
                                        Dashboard
                                    </a>
                                    <span style="color: white;"> > Reviews</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-content listing-section ">
        <div class="container">
            <div>
                <ul class="dashborad-menus">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            style="{{ request()->is('dashboard') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="feather-grid"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('profile') }}"
                            style="{{ request()->is('profile') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="fa-solid fa-user"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('mylisting') }}"
                            style="{{ request()->is('mylisting') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="feather-list"></i> <span>My Listing</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('orders') }}"
                            style="{{ request()->is('orders') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="fas fa-solid fa-heart"></i> <span>My Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('questions') }}"
                            style="{{ request()->is('questions') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="fa-solid fa-comment-dots"></i> <span>Questions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('reviews') }}"
                            style="{{ request()->is('reviews') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="fas fa-solid fa-star"></i> <span>Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('seller.updatepassword') }}"
                            style="{{ request()->is('seller/updatepassword') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                            <i class="fas fa-light fa-circle-arrow-left"></i> <span>Reset Password</span>
                        </a>
                    </li>
                </ul>
            </div>

  <div class="container-fluid mt-4">

    {{-- My Listings Card --}}
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card dash-cards">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">My Listings</h4>
                    <a class="btn btn-sm btn-primary add-listing" href="{{ URL::to('categories') }}">
                        <i class="fa-solid fa-plus"></i> Add Listing
                    </a>
                </div>
            </div>
        </div>
    </div>

<style>
    .review-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease-in-out;
    }

    .review-card:hover {
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        transform: translateY(-2px);
    }

    .reviewer-name {
        color: #0056d2;
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 8px;
    }

    .review-meta {
        font-size: 14px;
        color: #777;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .review-meta i {
        color: crimson;
    }

    .rating i {
        color: #ffc107;
        font-size: 16px;
    }

    .review-info p {
        margin-bottom: 6px;
        font-size: 16px;
    }

    .review-info strong {
        font-weight: 600;
    }

    .review-text {
        margin-top: 10px;
        font-size: 15px;
        color: #333;
        line-height: 1.5;
    }

    .reaction-form {
        margin-top: 20px;
    }

    .reaction-form .form-control {
        background-color: #d4eefb;
        border: 2px solid #00aaff;
        border-right: none;
        border-radius: 8px 0 0 8px;
        font-size: 15px;
    }

    .reaction-form .btn {
        border: 2px solid crimson;
        color: crimson;
        font-weight: bold;
        border-radius: 0 8px 8px 0;
        background-color: white;
        transition: 0.3s;
    }

    .reaction-form .btn:hover {
        background-color: crimson;
        color: #fff;
    }

    .section-header {
        font-weight: bold;
        color: #002244;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
        margin-bottom: 25px;
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card w-100 mb-4">
            <div class="card-header text-center bg-light">
                <h4 class="mb-0 section-header">Reviews on Your Products</h4>
            </div>
            <div class="card-body bg-light">
                @if ($sellerReviews->count())
                    @foreach ($sellerReviews as $review)
                        <div class="review-card">
                            <div class="reviewer-name">{{ $review->reviewer_name }}</div>

                            <div class="review-meta">
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                                <small>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}
                                </small>
                            </div>

                            <div class="review-info">
                                <p><strong>Product:</strong> {{ $review->product_title }}</p>
                                <p><strong>Type:</strong> {{ $review->product_type }}</p>
                                <p><strong>Category:</strong> {{ $review->product_category }}</p>
                            </div>

                            <div class="review-text">
                                {{ $review->review }}
                            </div>

                            {{-- Seller Reaction --}}
                            <form action="" method="POST" class="reaction-form">
                                @csrf
                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <div class="input-group">
                                    <input type="text" name="reaction" class="form-control" placeholder="Write a reply or reaction..." required>
                                    <button class="btn" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-muted">No reviews on your products yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

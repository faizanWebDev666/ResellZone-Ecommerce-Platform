@extends('frontend.layouts.main')
@section('title', 'My Profile | ResellZone')

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
                    Your Profile
                </h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb"
                        style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                        <li class="breadcrumb-item" style="display: inline; color: white;">
                            <a href="/"
                                style="color: #ffd700; text-decoration: none; font-weight: bold;">Dashboard</a>
                            <span style="color: white;">> Profile</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('type') === 'seller' || session('type') === 'admin')

<div class="dashboard-content listing-section ">
    <div class="container">
        <div>
            <ul class="dashborad-menus">
                <li>
                    <a href="{{ URL::to('dashboard') }}"
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
                    <a href="{{ URL::to('sellerUpdatePassword') }}"
                       style="{{ request()->is('sellerUpdatePassword') ? 'background-color: #a00028; color: white; border-radius: 5px; text-align: center;' : '' }}">
                        <i class="fas fa-light fa-circle-arrow-left"></i> <span>Reset Password</span>
                    </a>
                </li>
            </ul>
        </div>
@endif
    <div class="dash-listingcontent dashboard-info">
    <div class="dash-cards card">
    <div class="card-header">
    <h4>Update your password</h4>
    <a class="nav-link add-listing" href="{{URL::to('categories')}}"><span><i class="fa-solid fa-plus"></i></span>Add Listing</a>
    </div>
    </div>

<div class="container mt-5">
    <div class="row">


    <div class="col-lg-14">
        <div class="card p-4 shadow-lg">
            <div class="card-header text-center">
                <h4>Change Password</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('update.password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Current Password</label>
                        <div class="pass-group">
                            <span class="lock-icon"><i class="feather-lock"></i></span>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">New Password</label>
                        <div class="pass-group">
                            <span class="lock-icon"><i class="feather-lock"></i></span>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Confirm New Password</label>
                        <div class="pass-group">
                            <span class="lock-icon"><i class="feather-lock"></i></span>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                    </div>
                    <button class="btn btn-primary w-10" type="submit">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

        @endsection

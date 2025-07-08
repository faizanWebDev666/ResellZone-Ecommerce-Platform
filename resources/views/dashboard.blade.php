@extends('frontend.layouts.main')
@section('title', 'Dashboard | ResellZone')
@section('main-container')
    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins'; margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Dashboard <br>
                            Shop Name : {{ $storeName ?? 'No Shop Name' }}
                        </h2>

                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">

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

            <div class="dash-listingcontent dashboard-info">
                <div class="dash-cards card">
                    <div class="card-header">
                        <h4>My Dashboard</h4>
                        <a class="nav-link add-listing" href="{{ URL::to('categories') }}"><span><i
                                    class="fa-solid fa-plus"></i></span>Add Listing</a>
                    </div>


                </div>


                <div class="dashboard-details">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="dashcard-img">
                                            <img src="img/icons/verified.svg" class="img-fluid" alt>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Active Listing</h6>
                                        <h3 class="counter">{{ $activeListings }}</h3>
                                        <!-- Display active listings count -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="dashcard-img">
                                            <img src="img/icons/rating.svg" class="img-fluid" alt>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Total Reviews</h6>
                                        <h3 class="counter">{{ $totalRatings }}</h3>
                                        <!-- Display total reviews count dynamically -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="dashcard-img">
                                            <img src="img/icons/chat.svg" class="img-fluid" alt>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Total Questions</h6>
                                        <h3 class="counter">{{ $totalQuestions }}</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="dashcard-img">
                                            <img src="img/icons/bookmark.svg" class="img-fluid" alt>
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Wishlist</h6>
                                        <h3 class="counter">{{ $totalWishlist }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-14 d-flex">
                        <div class="card dash-cards w-100">
                            <div class="card-header">
                                <h4>Total Sales</h4>
                                <div class="card-dropdown">
                                    <ul>
                                        <li class="nav-item dropdown has-arrow logged-item">
                                            <a href="#" class="dropdown-toggle pageviews-link"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>
                                                    @if ($filter == 'today')
                                                        Today
                                                    @elseif($filter == 'this_week')
                                                        This Week
                                                    @elseif($filter == 'last_week')
                                                        Last Week
                                                    @elseif($filter == 'this_month')
                                                        This Month
                                                    @elseif($filter == 'last_month')
                                                        Last Month
                                                    @endif
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard', ['filter' => 'today']) }}">Today</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard', ['filter' => 'this_week']) }}">This
                                                    Week</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard', ['filter' => 'last_week']) }}">Last
                                                    Week</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard', ['filter' => 'this_month']) }}">This
                                                    Month</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard', ['filter' => 'last_month']) }}">Last
                                                    Month</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="container-fluid mt-4">

                                {{-- Filter Heading --}}
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="mb-3">Seller Sales Report ({{ ucfirst($filter) }})</h4>

                                                @if ($sellerOrders->count())
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-hover">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Customer Name</th>
                                                                    <th>Product Title</th>
                                                                    <th>Category</th>
                                                                    <th>Category Type</th>
                                                                    <th>Total Quantity</th>
                                                                    <th>Payment Type</th>
                                                                    <th>Total Revenue</th>
                                                                    <th>Order Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sellerOrders as $order)
                                                                    <tr>
                                                                        <td>{{ $order->customer_name }}</td>
                                                                        <td>{{ $order->product_title }}</td>
                                                                        <td>{{ $order->category }}</td>
                                                                        <td>{{ $order->type }}</td>
                                                                        <td>{{ $order->quantity }}</td>
                                                                        <td>{{ $order->payment_method }}</td>
                                                                        <td>Rs. {{ number_format($order->revenue, 2) }}
                                                                        </td>
                                                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <p class="text-muted">No orders found for this filter.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Shipped Orders with Filter Dropdown --}}
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="card dash-cards">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h4 class="mb-0">Shipped Orders</h4>
                                                <div class="dropdown">
                                                    <a href="#"
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ ucfirst($filter) }}
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('dashboard', ['filter' => 'today']) }}">Today</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('dashboard', ['filter' => 'this_week']) }}">This
                                                                Week</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('dashboard', ['filter' => 'last_week']) }}">Last
                                                                Week</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('dashboard', ['filter' => 'this_month']) }}">This
                                                                Month</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('dashboard', ['filter' => 'last_month']) }}">Last
                                                                Month</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                @if ($shippedOrders->count() > 0)
                                                    <ul class="list-group">
                                                        @foreach ($shippedOrders as $order)
                                                            <li class="list-group-item">
                                                                <strong>Order ID:</strong> {{ $order->id }}<br>
                                                                <strong>Shipped At:</strong>
                                                                {{ $order->updated_at->format('d M Y') }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="text-muted mb-0">No shipped orders found for
                                                        {{ ucfirst($filter) }}.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Bootstrap Bundle with Popper -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

                        @endsection

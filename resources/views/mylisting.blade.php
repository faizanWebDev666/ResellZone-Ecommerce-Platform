@extends('frontend.layouts.main')
@section('title', 'My Listing | ResellZone')
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
                            Your Products Listings
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Dashboard</a>
                                    <span style="color: white;">> Products</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="dashboard-content listing-section">
    <div class="container">
        <!-- Sidebar Menu -->
        <div>
            <ul class="dashborad-menus">
                <li>
                    <a href="{{ URL::to('dashboard') }}">
                        <i class="feather-grid"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('profile') }}">
                        <i class="fa-solid fa-user"></i> <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('mylisting') }}">
                        <i class="feather-list"></i> <span>My Listing</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('orders') }}">
                        <i class="fas fa-heart"></i> <span>My Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('questions') }}">
                        <i class="fa-solid fa-comment-dots"></i> <span>Questions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ URL::to('reviews') }}">
                        <i class="fas fa-star"></i> <span>Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('seller.updatepassword') }}">
                        <i class="fas fa-circle-arrow-left"></i> <span>Reset Password</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Listing Content -->
        <div class="dash-listingcontent dashboard-info">
            <div class="dash-cards card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>My Listings</h4>
                    <a class="nav-link add-listing" href="{{ URL::to('categories') }}">
                        <span><i class="fa-solid fa-plus"></i></span> Add Listing
                    </a>
                </div>

                <div class="card-body">
                    <!-- Search Bar -->
                    <div class="listing-search mb-3">
                        <div class="filter-content form-set">
                            <div class="group-img">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="feather-search"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Listings Table -->
                    <div class="table-responsive">
                        <table class="listing-table datatable" id="listdata-table">
                            <thead>
                                <tr>
                                    <th class="no-sort">Image</th>
                                    <th class="no-sort">Details</th>
                                    <th>Status</th>
                                    <th class="no-sort">Views</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ url('productdetails/' . $product->id) }}">
                                                <img 
                                                    class="img-fluid rounded shadow-sm"
                                                    src="{{ asset(optional($product->productImages->first())->product_images ?? 'default-product.jpg') }}" 
                                                    alt="Product Image"
                                                    style="max-width: 100px; height: auto;">
                                            </a>
                                        </td>

                                        <td>
                                            <h6>
                                                <a href="{{ url('productdetails/' . $product->id) }}">{{ $product->title }}</a>
                                            </h6>
                                            <div class="listingtable-rate">
                                                <span><i class="fa-regular fa-circle-stop"></i> {{ $product->category }}</span>
                                                <span class="fixed-amt">PKR {{ number_format($product->price, 2) }}</span>
                                            </div>
                                            <p>{{ Str::limit($product->description, 100) }}</p>
                                        </td>

                                        <td><span class="status-text">{{ $product->status }}</span></td>
                                        <td><span class="views-count">{{ $product->views }}</span></td>
                                       <td>
    <div class="action d-flex align-items-center">
        <!-- View Button -->
        <a href="{{ url('productdetails/' . $product->id) }}" 
           class="action-btn btn-view me-1" 
           title="View Product">
            <i class="fas fa-eye"></i>
        </a>

        <!-- Edit Button -->
        <a href="{{ route('categories', ['product_id' => $product->id]) }}" 
           class="action-btn btn-edit me-1" 
           title="Edit Product">
            <i class="fas fa-edit"></i>
        </a>

        <!-- Delete Button -->
        <form action="{{ url('delete-product/' . $product->id) }}" 
              method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this product?');" 
              style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn btn-trash" title="Delete Product">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.dash-listingcontent -->
    </div> <!-- /.container -->
</div> <!-- /.dashboard-content -->

@endsection

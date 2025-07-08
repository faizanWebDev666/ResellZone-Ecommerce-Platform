@extends('frontend.layouts.main')
@section('title', 'My Orders | ResellZone')

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
                            Your Orders
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Dashboard</a>
                                    <span style="color: white;">> Orders</span>
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

                <div class="dash-listingcontent dashboard-info">
    <div class="dash-cards card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>My Listings</h4>
            <a class="btn btn-primary btn-sm" href="{{ URL::to('categories') }}">
                <i class="fa-solid fa-plus me-1"></i> Add Listing
            </a>
        </div>
    </div>
    {{-- Seller Notice --}}
<div class="alert alert-warning d-flex align-items-start gap-3 p-4 mb-4 shadow-sm" role="alert">
    <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
    <div>
        <h5 class="mb-1">Important Seller Notice</h5>
        <p class="mb-0">
            <strong>Please ship your orders within <u>3 days</u> of receiving them.</strong><br>
            Orders not marked as <span class="badge bg-info text-dark">Shipped</span> within <strong>72 hours</strong> may be <span class="text-danger fw-bold">automatically canceled</span> to ensure buyer satisfaction and platform trust.
        </p>
        <ul class="mt-2 mb-0 small ps-4">
            <li>✅ Keep your listings and inventory up to date.</li>
            <li>📦 Use reliable shipping services.</li>
            <li>📬 Regularly check your dashboard for new orders.</li>
        </ul>
    </div>
</div>

    <div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-box-open me-2"></i>Total Listings</h5>
                <h3>{{ $totalListings ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-check-circle me-2"></i>Total Delivered Orders</h5>
                <h3>{{ $deliveredOrdersCount ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-truck me-2"></i>Pending Shipments</h5>
                <h3>{{ $pendingOrdersCount ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info h-100">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-coins me-2"></i>Total Revenue</h5>
                <h3>PKR {{ number_format($totalRevenue ?? 0, 2) }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="mb-4 d-flex flex-wrap gap-2">
    <a href="{{ route('user.orders', ['status' => 'Pending']) }}" class="btn btn-outline-warning {{ request('status') == 'Pending' ? 'active' : '' }}">
        <i class="fas fa-clock me-1"></i> Pending Orders
    </a>
    <a href="{{ route('user.orders', ['status' => 'Shipped']) }}" class="btn btn-outline-info {{ request('status') == 'Shipped' ? 'active' : '' }}">
        <i class="fas fa-truck me-1"></i> Shipped Orders
    </a>
    <a href="{{ route('user.orders', ['status' => 'Delivered']) }}" class="btn btn-outline-success {{ request('status') == 'Delivered' ? 'active' : '' }}">
        <i class="fas fa-check-circle me-1"></i> Delivered Orders
    </a>
</div>

    {{-- Download Button --}}
    <div class="mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <a href="{{ route('orders.pdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf me-1"></i> Download Orders PDF
        </a>
    </div>

    {{-- Filters --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Filter Orders</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="" class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="email" class="form-control" placeholder="Customer Email" value="{{ request('email') }}">
                </div>

                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Shipped" {{ request('status') == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Delivered" {{ request('status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @php
                            $categories = ['Vehicles','Electronics','fashion style','health care','job board','mobiles','property','services','kids','books & supports','pet & animal','furniture'];
                        @endphp
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <select name="date_filter" class="form-select">
                        <option value="">All Dates</option>
                        <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="weekly" {{ request('date_filter') == 'weekly' ? 'selected' : '' }}>This Week</option>
                        <option value="monthly" {{ request('date_filter') == 'monthly' ? 'selected' : '' }}>This Month</option>
                        <option value="yearly" {{ request('date_filter') == 'yearly' ? 'selected' : '' }}>This Year</option>
                    </select>
                </div>

                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">Apply</button>
                    <a href="" class="btn btn-outline-secondary w-100">Reset</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center" id="listdata-table" style="font-size: 14px;">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Customer Status</th>
                    <th>Price</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @php
                        $orderItem = $orderItems->where('orderId', $order->id)->first();
                    @endphp
                    <tr id="order-row-{{ $order->id }}">
                        <td>{{ $order->id }}</td>
                        <td>
                            @if ($orderItem)
                                <a href="{{ url('productdetails/' . $orderItem->productId) }}">
                                    <img class="img-fluid rounded shadow" src="{{ asset($orderItem->picture ?? 'default-product.jpg') }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                </a>
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            @if ($orderItem)
                                <h6>
                                    <a href="{{ url('productdetails/' . $orderItem->productId) }}">
                                        {{ $orderItem->title }}
                                    </a>
                                </h6>
                            @else
                                <span class="text-muted">No Product</span>
                            @endif
                        </td>
                        <td>{{ $orderItem->quantity ?? '-' }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td class="text-info">{{ $order->userStatus }}</td>
                        <td class="fw-bold">PKR {{ $orderItem ? number_format($orderItem->price, 2) : '-' }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->adress }}</td>
                        <td>
                            <span class="badge bg-warning text-dark order-status-{{ $order->id }}">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-1 justify-content-center">
                                <button class="btn btn-outline-info btn-sm change-status" data-id="{{ $order->id }}" data-status="Shipped" title="Mark as Shipped">
                                    <i class="fas fa-truck fa-sm me-1"></i> Shipped
                                </button>
                                <button class="btn btn-outline-success btn-sm change-status" data-id="{{ $order->id }}" data-status="Delivered" title="Mark as Delivered">
                                    <i class="fas fa-check-circle fa-sm me-1"></i> Delivered
                                </button>
                                <button class="btn btn-outline-danger btn-sm change-status" data-id="{{ $order->id }}" data-status="Cancelled" title="Mark as Cancelled">
                                    <i class="fas fa-times-circle fa-sm me-1"></i> Cancelled
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $(".change-status").click(function() {
                            let orderId = $(this).data("id");
                            let newStatus = $(this).data("status");

                            $.ajax({
                                url: "{{ route('changeOrderStatus') }}",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: orderId,
                                    status: newStatus
                                },
                                success: function(response) {
                                    if (response.success) {
                                        $(".order-status-" + orderId).text(newStatus).removeClass()
                                            .addClass("badge order-status-" + orderId);
                                        if (newStatus === "Shipped") {
                                            $(".order-status-" + orderId).addClass("bg-primary text-white");
                                        } else if (newStatus === "Delivered") {
                                            $(".order-status-" + orderId).addClass("bg-success text-white");
                                        } else if (newStatus === "Cancelled") {
                                            $(".order-status-" + orderId).addClass("bg-danger text-white");
                                        }
                                    } else {
                                        alert("Error updating status.");
                                    }
                                },
                                error: function() {
                                    alert("Something went wrong!");
                                }
                            });
                        });
                    });
                </script>


               


@endsection

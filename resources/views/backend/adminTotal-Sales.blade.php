@extends('backend.layouts.main')

@section('title', 'Admin Panel - Customers | ResellZone')

@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="content-page-header">
                    <h5>Total Sales</h5>
                </div>
            </div>
            <div id="filter_inputs" class="card filter-card mb-2" style="display: block; visibility: visible;">
                <div class="card-body pb-0">
                    <form method="GET" action="{{ route('admin.Totalsales') }}">
                        <div class="row">
                            <div class="col-sm-6 col-md-2">
                                <label>Start Date</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}">
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select">
                                    <option value="">All</option>
                                    <option value="Vehicles" {{ request('category') == 'Vehicles' ? 'selected' : '' }}>
                                        Vehicles</option>
                                    <option value="Electronics"
                                        {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="fashion style"
                                        {{ request('category') == 'fashion style' ? 'selected' : '' }}>fashion style
                                    </option>
                                    <option value="health care"
                                        {{ request('category') == 'health care' ? 'selected' : '' }}>health care</option>
                                    <option value="job board" {{ request('category') == 'job board' ? 'selected' : '' }}>job
                                        board</option>
                                    <option value="mobiles" {{ request('category') == 'mobiles' ? 'selected' : '' }}>mobiles
                                    </option>
                                    <option value="property" {{ request('category') == 'property' ? 'selected' : '' }}>
                                        property</option>
                                    <option value="services" {{ request('category') == 'services' ? 'selected' : '' }}>
                                        services</option>
                                    <option value="kids" {{ request('category') == 'kids' ? 'selected' : '' }}>kids
                                    </option>
                                    <option value="books & supports"
                                        {{ request('category') == 'books & supports' ? 'selected' : '' }}>books & supports
                                    </option>
                                    <option value="pet & animal"
                                        {{ request('category') == 'pet & animal' ? 'selected' : '' }}>pet & animal</option>
                                    <option value="furniture" {{ request('category') == 'furniture' ? 'selected' : '' }}>
                                        furniture</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <label>Payment Method</label>
                                <select name="payment_method" class="form-select">
                                    <option value="">All</option>
                                    <option value="COD" {{ request('payment_method') == 'COD' ? 'selected' : '' }}>COD
                                    </option>
                                    <option value="Stripe" {{ request('payment_method') == 'Stripe' ? 'selected' : '' }}>
                                        Stripe
                                    </option>

                                </select>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <label>Sort By</label>
                                <select name="sort_by" class="form-select">
                                    <option value="">Default</option>
                                    <option value="top_selling"
                                        {{ request('sort_by') == 'top_selling' ? 'selected' : '' }}>
                                        Top Selling</option>
                                    <option value="lowest_selling"
                                        {{ request('sort_by') == 'lowest_selling' ? 'selected' : '' }}>Lowest Selling
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-2 d-flex align-items-end gap-2">
                                <button class="btn btn-primary w-100">Apply</button>
                                <a href="{{ route('admin.Totalsales') }}" class="btn btn-secondary w-100">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Category Type</th>
                                            <th>Price</th>
                                            <th>Payment Method</th>
                                            <th>Total Units Sold</th>
                                            <th>Total Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    @if ($product->image)
                                                        @if (Str::startsWith($product->image, ['http://', 'https://']))
                                                            <img src="{{ $product->image }}" alt="Product Image"
                                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                                        @else
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                alt="Product Image"
                                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                                        @endif
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $product->category }}</td>
                                                <td>{{ $product->type }}</td>
                                                <td>Rs. {{ $product->price }}</td>
                                                <td>{{ $product->payment_method }}</td>
                                                <td>{{ $product->total_units_sold ?? 0 }}</td>
                                                <td>Rs. {{ number_format($product->total_revenue ?? 0, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

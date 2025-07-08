@extends('backend.layouts.main')

@section('title', 'Admin Panel - Products | ResellZone')

@section('main-container')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Manage All Products</h5>

                </div>
            </div>

            <div id="filter_inputs" class="card filter-card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3">
                                <label>Phone</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
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
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Type</th>
                                            <th>Condition</th>
                                            <th>Location</th>
                                            <th>Phone</th>
                                            <th>Rating</th>
                                            <th>Reviews</th>
                                            <th>Status</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html" class="avatar avatar-md me-2">
                                                            <img src="{{ $item->productImages->first()->product_images ?? '' }}"
                                                                class="card-img-top" alt="product-img">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>{{ $item->condition ?? 'No Condition'}}</td>
                                                <td>{{ $item->location }}</td>
                                                <td>{{ $item->phone_number }}</td>

                                               {{-- Rating --}}
<td>
    @php
        $avg = round($item->ratings->avg('rating'), 1);
    @endphp

    @if($item->ratings->count() > 0)
        ⭐ {{ $avg }} / 5
    @else
        No rating
    @endif
</td>

{{-- Review Count --}}
<td>
    @php
        $count = $item->ratings->count();
    @endphp

    {{ $count }} {{ Str::plural('review', $count) }}
</td>


                                             <!-- Status Column -->
<td>
    @if ($item->status == 'active')
        <span class="badge bg-success-light">Active</span>
    @else
        <span class="badge bg-danger-light">Inactive</span>
    @endif
</td>

<!-- Action Icons Only (No Dropdown) -->
<td class="d-flex align-items-center gap-2">

    <!-- View Product -->
    <a href="{{ route('product-details', ['id' => $item->id]) }}"
        class="btn btn-sm btn-light" title="View Product" data-bs-toggle="tooltip">
        <i class="far fa-eye text-info"></i>
    </a>

    <!-- Delete Product -->
    <a href="javascript:void(0);" class="btn btn-sm btn-light delete-btn"
        data-id="{{ $item->id }}" data-bs-toggle="modal"
        data-bs-target="#delete_modal" title="Delete" data-bs-toggle="tooltip">
        <i class="far fa-trash-alt text-danger"></i>
    </a>

    <!-- Activate / Deactivate Product -->
    @if ($item->status == 'active')
        <form id="deactivate-form-{{ $item->id }}"
            action="{{ route('product.deactivate', $item->id) }}"
            method="POST" class="d-none">
            @csrf
        </form>
        <a href="#" class="btn btn-sm btn-light" title="Deactivate"
            onclick="event.preventDefault(); document.getElementById('deactivate-form-{{ $item->id }}').submit();"
            data-bs-toggle="tooltip">
            <i class="far fa-bell-slash text-warning"></i>
        </a>
    @else
        <form id="activate-form-{{ $item->id }}"
            action="{{ route('product.activate', $item->id) }}"
            method="POST" class="d-none">
            @csrf
        </form>
        <a href="#" class="btn btn-sm btn-light" title="Activate"
            onclick="event.preventDefault(); document.getElementById('activate-form-{{ $item->id }}').submit();"
            data-bs-toggle="tooltip">
            <i class="fa-solid fa-power-off text-success"></i>
        </a>
    @endif

</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="toggle-sidebar ledge">
                <div class="sidebar-layout-filter">
                    <div class="sidebar-header ledge">
                        <h5>PayIn</h5>
                        <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
                    </div>
                    <div class="sidebar-header submenu">
                        <h6>Test Company</h6>
                        <p class="text-success-light">Balance: $400</p>
                    </div>
                    <div class="sidebar-body">
                        <form action="#" autocomplete="off">
                            <!-- Customer -->
                            <div class="accordion accordion-last" id="accordionMain1">
                                <div class="card-header-new" id="headingOne">
                                    <h6 class="filter-title">
                                        <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Customers
                                            <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                        </a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample1">
                                    <div class="card-body-chat">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="checkBoxes1">
                                                    <div class="form-custom">
                                                        <input type="text" class="form-control" id="member_search1"
                                                            placeholder="Search Customer">
                                                        <span><img src="assets/img/icons/search.svg"
                                                                alt="img"></span>
                                                    </div>
                                                    <div class="selectBox-cont">
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> John Smith
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Johnny Charles
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Robert George
                                                        </label>
                                                        <label class="custom_check w-100">
                                                            <input type="checkbox" name="username">
                                                            <span class="checkmark"></span> Sharonda Letha
                                                        </label>
                                                        <!-- View All -->
                                                        <div class="view-content">
                                                            <div class="viewall-One">
                                                                <label class="custom_check w-100">
                                                                    <input type="checkbox" name="username">
                                                                    <span class="checkmark"></span> Pricilla Maureen
                                                                </label>
                                                                <label class="custom_check w-100">
                                                                    <input type="checkbox" name="username">
                                                                    <span class="checkmark"></span> Randall Hollis
                                                                </label>
                                                            </div>
                                                            <div class="view-all">
                                                                <a href="javascript:void(0);"
                                                                    class="viewall-button-One"><span class="me-2">View
                                                                        All</span><span><i
                                                                            class="fa fa-circle-chevron-down"></i></span></a>
                                                            </div>
                                                        </div>
                                                        <!-- /View All -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Customer -->
                            <div class="accordion" id="accordionMain2">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="input-block mb-3">
                                        <label>Enter Amount</label>
                                        <input type="text" class="form-control" placeholder="Enter Amount">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-block mb-3">
                                        <label>Payment Date</label>
                                        <div class="cal-icon cal-icon-info">
                                            <input type="text" class="datetimepicker form-control"
                                                placeholder="Select Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-block mb-3 notes-form-group-info">
                                    <label>Notes</label>
                                    <textarea class="form-control" placeholder="Enter your notes"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" data-bs-dismiss="modal"
                                        class="btn btn-back cancel-btn me-2">Cancel</a>
                                    <a href="#" data-bs-dismiss="modal"
                                        class="btn btn-primary paid-continue-btn">Add Payment</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/Add Asset -->

            <!-- Delete Items Modal -->
            <div class="modal custom-modal fade" id="delete_modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Product</h3>
                                <p>Are you sure you want to delete this product?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <form id="delete-form" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-100 btn btn-danger">Delete</button>
                                        </form>


                                    </div>
                                    <div class="col-6">
                                        <button type="button" data-bs-dismiss="modal"
                                            class="w-100 btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const deleteButtons = document.querySelectorAll(".delete-btn");
                deleteButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        const productId = this.getAttribute("data-id");
                        const deleteForm = document.getElementById("delete-form");

                        // Use Laravel route helper inside script tags in a Blade file
                        deleteForm.action = `{{ route('product.delete', ':id') }}`.replace(':id',
                            productId);
                    });
                });
            });
        </script>




    @endsection

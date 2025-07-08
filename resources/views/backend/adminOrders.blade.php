@extends('backend.layouts.main')

@section('title', 'Admin Panel - Orders | ResellZone')

@section('main-container')
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header">
                <h5>Manage Orders</h5>
            </div>
        </div>

        <!-- Search Filter -->
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
        <!-- /Search Filter -->

        <!-- Orders Table -->
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
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Condition</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th class="no-sort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Orders as $order)
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->product->title ?? 'N/A' }}</td>
                                                <td>{{ $item->product->category ?? 'N/A' }}</td>
                                                <td>{{ $item->product->type ?? 'N/A' }}</td>
                                                <td>{{ $item->product->condition ?? 'N/A' }}</td>
                                                <td>{{ $item->product->location ?? 'N/A' }}</td>
                                                <td>{{ $order->phone ?? 'N/A' }}</td> {{-- Make sure order has phone --}}
                                                <td class="d-flex align-items-center">
                                                    <a href="add-invoice.html" class="btn btn-greys me-2">
                                                        <i class="fa fa-plus-circle me-1"></i> Invoice
                                                    </a>
                                                    <a href="customers-ledger.html" class="btn btn-greys me-2">
                                                        <i class="fa-regular fa-eye me-1"></i> Ledger
                                                    </a>
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="btn-action-icon" data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul>
                                                                <li>
                                                                    <a class="dropdown-item" href="edit-customer.html">
                                                                        <i class="far fa-edit me-2"></i>Edit
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal">
                                                                        <i class="far fa-trash-alt me-2"></i>Delete
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="customer-details.html">
                                                                        <i class="far fa-eye me-2"></i>View
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="active-customers.html">
                                                                        <i class="fa-solid fa-power-off me-2"></i>Activate
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="deactive-customers.html">
                                                                        <i class="far fa-bell-slash me-2"></i>Deactivate
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Orders Table -->

        <!-- Delete Items Modal -->
        <div class="modal custom-modal fade" id="delete_modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Customer</h3>
                            <p>Are you sure you want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="reset" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-continue-btn">Delete</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Items Modal -->

    </div>
</div>
@endsection

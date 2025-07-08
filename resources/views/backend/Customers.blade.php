@extends('backend.layouts.main')

@section('title', 'Admin Panel - Customers | ResellZone')

@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Manage Users</h5>
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
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>

                                            <th>Profile Pictures</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <img src="{{ $item->profile_picture ? asset('storage/' . $item->profile_picture) : asset('backend/img/defaultprofile.png') }}"
                                                            class="card-img-top" alt="Profile Picture"
                                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 25%;">
                                                    </h2>
                                                </td>

                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->type }}</td>

                                                <!-- Status Badge -->
                                                <td>
                                                    @if ($item->status == 'active')
                                                        <span class="badge bg-success-light">Active</span>
                                                    @else
                                                        <span class="badge bg-danger-light">Inactive</span>
                                                    @endif
                                                </td>

                                                <!-- Action Icons -->
                                                <td class="d-flex align-items-center gap-2">

                                                    <!-- Delete Icon -->
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-light delete-btn"
                                                        data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete_modal" title="Delete">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </a>

                                                    <!-- View Icon -->
                                                    <a href="{{ route('customer.details', ['id' => $item->id]) }}"
                                                        class="btn btn-sm btn-light" title="View">
                                                        <i class="far fa-eye text-info"></i>
                                                    </a>

                                                    <!-- Activate / Deactivate Icon -->
                                                    @if ($item->status == 'active')
                                                        <form id="deactivate-form-{{ $item->id }}"
                                                            action="{{ route('user.deactivate', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <a href="#" class="btn btn-sm btn-light" title="Deactivate"
                                                            onclick="event.preventDefault(); document.getElementById('deactivate-form-{{ $item->id }}').submit();">
                                                            <i class="far fa-bell-slash text-warning"></i>
                                                        </a>
                                                    @else
                                                        <form id="activate-form-{{ $item->id }}"
                                                            action="{{ route('user.activate', $item->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                        </form>
                                                        <a href="#" class="btn btn-sm btn-light" title="Activate"
                                                            onclick="event.preventDefault(); document.getElementById('activate-form-{{ $item->id }}').submit();">
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

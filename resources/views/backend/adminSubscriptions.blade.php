@extends('backend.layouts.main')

@section('title', 'Newsletters Management | ResellZone')

@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Manage Newsletters</h5>
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
                                            <th>Email</th>
                                            <th>Time</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscriptions as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td class="d-flex align-items-center gap-2">
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-light delete-btn"
                                                        data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#delete_modal" title="Delete"
                                                        data-bs-toggle="tooltip">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </a>
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
                                deleteForm.action = `{{ route('newsletter.delete', ':id') }}`.replace(':id',
                                    productId);
                            });
                        });
                    });
                </script>
            @endsection

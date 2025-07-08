@extends('backend.layouts.main')
@section('title', 'Admin Panel - Contacts | ResellZone')
@section('main-container')
   
  
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Manage Contacts</h5>
                        
                    </div>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->subject }}</td>
                                                <td>{{ $item->msg }}</td>
                                                <td>
                                                    @if ($item->status == 'read')
                                                        <span class="badge bg-success-light">Read</span>
                                                    @else
                                                        <span class="badge bg-danger-light">Unread</span>
                                                    @endif
                                                </td>
                                              <td class="d-flex align-items-center gap-2">

    <!-- Reply Icon -->
    <a href="mailto:{{ $item->email }}" class="btn btn-sm btn-light" title="Reply">
        <i class="far fa-reply text-primary"></i>
    </a>

    <!-- Mark as Read/Unread -->
    @if ($item->status == 'read')
        <form id="mark-unread-form-{{ $item->id }}" action="{{ route('contact.markUnread', $item->id) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="btn btn-sm btn-light" title="Mark as Unread"
            onclick="event.preventDefault(); document.getElementById('mark-unread-form-{{ $item->id }}').submit();">
            <i class="far fa-envelope text-warning"></i>
        </a>
    @else
        <form id="mark-read-form-{{ $item->id }}" action="{{ route('contact.markRead', $item->id) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="btn btn-sm btn-light" title="Mark as Read"
            onclick="event.preventDefault(); document.getElementById('mark-read-form-{{ $item->id }}').submit();">
            <i class="far fa-envelope-open text-success"></i>
        </a>
    @endif

    <!-- Delete Icon -->
    <a href="javascript:void(0);" class="btn btn-sm btn-light delete-btn"
        data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#delete_modal" title="Delete">
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

            <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="delete_modal_label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete_modal_label">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this contact?
                        </div>
                        <div class="modal-footer">
                            <form id="delete-form" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Handle Delete Button Click
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll(".delete-btn").forEach(function(button) {
                        button.addEventListener("click", function() {
                            let id = this.getAttribute("data-id");
                            let form = document.getElementById("delete-form");
                            form.setAttribute("action", "/contacts/" + id + "/delete");
                        });
                    });
                });
            </script><!-- /Page Wrapper -->



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

                        deleteForm.action = `{{ route('contact.delete', ':id') }}`.replace(':id',
                            productId);
                    });
                });
            });
        </script>



    @endsection

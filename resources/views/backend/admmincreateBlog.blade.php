@extends('backend.layouts.main')

@section('title', 'Admin Panel - Manage Policy | ResellZone')

@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h1>Add Blog Post</h1>

                </div>
            </div>
            ->
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

  

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="8"></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Publish Blog</button>
    </form>



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
                                                        <span><img src="assets/img/icons/search.svg" alt="img"></span>
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
      




    @endsection

@extends('backend.layouts.main')

@section('title', 'Profile Management | ResellZone')

@section('main-container')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <div class="row justify-content-lg-center">
            <div class="col-lg-10">

                <div class="profile-cover">
                    <div class="profile-cover-wrap">
                        <img class="profile-cover-img" src="{{ asset('storage/' . ($admin->cover_pic ?? 'frontend/img/default-cover.jpg')) }}" alt="Profile Cover" id="cover-image-preview" style="display: block;">

                        <div class="cover-content">
                            <form id="coverForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file-btn">
                                    <input type="file" class="custom-file-btn-input" name="cover_pic" id="cover_upload" onchange="uploadCoverImage(event)">
                                    <label class="custom-file-btn-label btn btn-sm btn-white" for="cover_upload">
                                        <i class="fas fa-camera"></i>
                                        <span class="d-none d-sm-inline-block ms-1">Update Cover</span>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Profile Picture Section -->
                <div class="text-center mb-5">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                            <!-- Profile Image -->
                            <img class="avatar-img" 
                            src="{{ asset('storage/' . (session('profile_picture') ?? $admin->admin_profile ?? 'frontend/img/default-avatar.jpg')) }}" 
                            alt="Profile Image" 
                            id="profile-image-preview">
                        
                            <input type="file" id="avatar_upload" name="admin_profile" onchange="previewImage(event, 'profile-image-preview')">
                            <span class="avatar-edit">
                                <i class="fe fe-edit avatar-uploader-icon shadow-soft"></i>
                            </span>
                        </label>
                    </form>
                </div>

        
<script>
function previewImage(event, imageId) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById(imageId);
        output.src = reader.result;
        output.style.display = "block"; 
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Handle Cover Image Upload via AJAX
function uploadCoverImage(event) {
    var formData = new FormData(document.getElementById("coverForm"));
    var fileInput = event.target;

    if (fileInput.files.length > 0) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("cover-image-preview").src = e.target.result;
        };
        reader.readAsDataURL(fileInput.files[0]);

        // Send form data using AJAX to prevent full-page refresh
        fetch("{{ route('admin.profile.update') }}", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log("Success:", data);
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }
}
</script>
@if ($admin)
<div class="row">
    <div class="col-lg-4">
        <div class="card card-body">
            <h5>Complete your profile</h5>

            <!-- Progress -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="progress progress-md flex-grow-1">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="ms-4">30%</span>
            </div>
            <!-- /Progress -->
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title d-flex justify-content-between">
                    <span>Profile</span>
                    <a class="btn btn-sm btn-white" href="settings.html">Edit</a>
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="py-0">
                        <h6>About</h6>
                    </li>
                    <li>
                        <td>{{ $admin->name }}</td>
                    </li>
                  
                    <li class="pt-2 pb-0">
                        <h6>Contacts</h6>
                    </li>
                    <li>
                        <td>{{ $admin->email }}</td>
                    </li>
                   
                    <li class="pt-2 pb-0">
                        <h6>Address</h6>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Activity</h5>
            </div>
            <div class="card-body card-body-height">
                <ul class="activity-feed">
                    <li class="feed-item">
                        <div class="feed-date">Nov 16</div>
                        <span class="feed-text"><a href="profile.html">Brian Johnson</a> has paid the invoice <a
                                href="invoice-details.html">"#DF65485"</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@else
<p class="text-danger">User not found.</p>
@endif
<!-- /Page Wrapper -->

</div>
   @endsection

@extends('frontend.layouts.main')
@section('title', 'My Profile | ResellZone')

@section('main-container')
    @if (isset($user) && $user->avatar)
        <img class="avatar-img rounded-circle" src="{{ asset('backend/img/profiles/' . $user->avatar) }}" alt="avatar">
    @else
        <img class="avatar-img rounded-circle" src="{{ asset('backend/img/profiles/default-avatar.jpg') }}" alt="avatar">
    @endif

    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins';margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Your Profile
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Dashboard</a>
                                    <span style="color: white;">> Profile</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('type') === 'seller' || session('type') === 'admin')

    <div class="dashboard-content listing-section ">
        <div class="container">
            <div>
                <ul class="dashborad-menus">
                    <li>
                        <a href="{{ URL::to('dashboard') }}"
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
                            <i class="fas fa-solid fa-heart"></i> <span>My orders</span>
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
@endif
            <div class="dash-listingcontent dashboard-info">
                <div class="dash-cards card">
                    <div class="card-header">
                        <h4>My Profile</h4>
                        <a class="nav-link add-listing" href="{{ URL::to('categories') }}"><span><i
                                    class="fa-solid fa-plus"></i></span>Add Listing</a>
                    </div>
                </div>

                <div class="container mt-5">
                    <div class="row">
                        <!-- Profile Picture Section -->
                        <div class="col-lg-14">
                            <div class="card shadow-lg border-0 rounded-4">
                                <div class="card-header text-center">
                                    <h4>Update Profile Picture</h4>
                                    <h6>Maximum Size 2048 KB</h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="profile-photo mb-3">
                                        <div class="settings-upload-img">
                                            @if (isset($user) && $user->profile_picture)
                                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                    alt="Profile Picture" class="rounded-circle img-thumbnail profile-img"
                                                    id="profilePic">
                                            @else
                                            <img src="{{ asset($user->profile_picture ? 'storage/' . $user->profile_picture : 'backend/img/defaultprofile.png') }}" 
                                            alt="Complete Your Profile" class="rounded-circle img-thumbnail profile-img" id="profilePic">
                                       
                                            @endif
                                        </div>
                                    </div>
                                    <form id="profilePicForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="file" accept=".jpg, .jpeg, .png, .gif, .webp" name="image"
                                                class="form-control" id="file" required>
                                        </div>
                                        <button type="submit" class="btn btn-maroon w-10">Upload New Photo</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- User Details Section -->
                        <div class="col-lg-14">
                            <div class="card shadow-lg border-0 rounded-4">
                                <div class="card-header text-center text-white">
                                    <h4 class="mb-0">User Profile</h4>
                                </div>
                                <div class="card-body p-4">
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                                    <form id="profileForm">
                                        @csrf
                                        <meta name="csrf-token" content="{{ csrf_token() }}">

                                        <div class="mb-3">
                                            <label class="form-label fw-bold text-maroon">Your Name</label>
                                            <input type="text" name="name" class="form-control bg-light text-dark"
                                                value="{{ old('name', $user->name) }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold text-maroon">Email Address</label>
                                            <input type="email" name="email" class="form-control bg-light text-dark"
                                                value="{{ old('email', $user->email) }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold text-maroon">Phone Number</label>
                                            <input type="text" name="phone" class="form-control bg-light text-dark"
                                                value="{{ old('phone', $user->phone ?? '') }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold text-maroon">Address</label>
                                            <textarea name="address" class="form-control bg-light text-dark" readonly>
                                {{ old('address', $user->address ?? '') }}
                            </textarea>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="button" id="editProfileBtn" class="btn btn-maroon">Edit
                                                Profile</button>
                                            <button type="submit" id="saveProfileBtn"
                                                class="btn btn-success d-none">Save Changes</button>
                                            <button type="button" id="cancelEditBtn"
                                                class="btn btn-secondary d-none">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    document.getElementById('profilePicForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        var formData = new FormData(this);
                        fetch("{{ route('profile.upload') }}", {
                                method: "POST",
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    document.getElementById('profilePic').src = data.profilePicUrl;
                                    alert('Profile picture updated successfully!');
                                } else {
                                    alert('Failed to upload image.');
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                                alert('An error occurred while uploading the image.');
                            });
                    });
                </script>

                <style>
                    .bg-maroon {
                        background-color: #C40032 !important;
                        /* Mehroon color */
                    }

                    .text-maroon {
                        color: #C40032 !important;
                    }

                    .btn-maroon {
                        background-color: #C40032;
                        color: white;
                        border-radius: 20px;
                        font-weight: bold;
                        border: none;
                        padding: 10px 15px;
                        cursor: pointer;
                    }

                    .btn-maroon:hover {
                        background-color: #C40032;
                        /* Slightly darker shade on hover */
                    }

                    .profile-img {
                        width: 150px;
                        height: 150px;
                        object-fit: cover;
                        border: 3px solid #C40032;
                    }
                </style>
                <script>
                    document.getElementById('editProfileBtn').addEventListener('click', function() {
                        document.querySelectorAll('input, textarea').forEach(el => el.removeAttribute('readonly'));
                        document.getElementById('editProfileBtn').classList.add('d-none');
                        document.getElementById('saveProfileBtn').classList.remove('d-none');
                        document.getElementById('cancelEditBtn').classList.remove('d-none');
                    });

                    document.getElementById('cancelEditBtn').addEventListener('click', function() {
                        location.reload();
                    });

                    document.getElementById('profileForm').addEventListener('submit', function(event) {
                        event.preventDefault();

                        let formData = new FormData(this);

                        fetch("{{ route('profile.update') }}", {
                                method: "POST",
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert("Profile updated successfully!");
                                    location.reload();
                                } else {
                                    alert("Failed to update profile: " + data.message);
                                }
                            })
                            .catch(error => console.error("Error updating profile:", error));
                    });
                </script>
            @endsection

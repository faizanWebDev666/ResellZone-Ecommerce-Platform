@extends('backend.layouts.main')

@section('title', 'Admin Dashboard | Customer Details')

@section('main-container')
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header d-flex justify-content-between align-items-center">
                <h4 class="page-title">Customer Details</h4>
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>

        <!-- Customer Details Card -->
        <div class="card shadow-sm border-0 rounded">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Basic Information</h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-4">
                    <div class="col-md-3 text-center">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('backend/img/defaultprofile.png')  }}"
                             class="img-thumbnail shadow"
                             style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;"
                             alt="Profile Picture">
                    </div>
                    <div class="col-md-9">
                        <table class="table table-borderless">
                            <tr>
                                <th>Name:</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $user->phone ?? 'User Not Upload' }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $user->address ?? 'User Not Upload' }}</td>
                            </tr>
                            
                            <tr>
                                <th>Joined On:</th>
                                <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($user->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

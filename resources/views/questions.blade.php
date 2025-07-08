@extends('frontend.layouts.main')
@section('title', 'Queries | ResellZone')

@section('main-container')

    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins'; margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Customers Queries - {{ $storeName ?? 'No Shop Name' }}
                        </h2>

                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-content listing-section ">
        <div class="container">
            <div>
                <ul class="dashborad-menus">
                    <li>
                        <a href="{{ route('dashboard') }}"
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
                            <i class="fas fa-solid fa-heart"></i> <span>My Orders</span>
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

            <div class="dash-listingcontent dashboard-info">
                <div class="dash-cards card">
                    <div class="card-header">
                        <h4>Question Answer Session</h4>
                        <a class="nav-link add-listing" href="{{ URL::to('categories') }}"><span><i
                                    class="fa-solid fa-plus"></i></span>Add Listing</a>
                    </div>
                    <div class="dash-listingcontent dashboard-info">
                        <div class="dash-cards card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="thead-dark">
                                            <tr class="bg-light">
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Question</th>
                                                <th>User_Name</th>
                                                <th>Product_Category</th>
                                                <th>Answer</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $question)
                                                @if (!$question->answer)
                                                    <tr id="question-{{ $question->id }}" class="border-bottom">
                                                        <td class="align-middle"><strong>#{{ $question->id }}</strong></td>
                                                        <td class="align-middle">
                                                            <div class="listingtable-img text-center">
                                                                <img class="img-fluid rounded shadow-sm"
                                                                    src="{{ asset(optional($question->product->productImages->first())->product_images ?? 'default-product.jpg') }}"
                                                                    alt="Product Image"
                                                                    style="width: 60px; height: 60px; object-fit: cover;">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle">
                                                            <h6 class="text-primary fw-bold">
                                                                {{ ucfirst($question->question) }}
                                                            </h6>
                                                        </td>


                                                        <td class="align-middle">{{ $question->user->name ?? 'Unknown' }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $question->product->category ?? 'Unknown' }}</td>
                                                        <td>
                                                            <p class="text-muted small">
                                                                {{ Str::limit($question->body, 100) }}
                                                            </p>

                                                            <form class="answer-form mt-2" data-id="{{ $question->id }}">
                                                                @csrf
                                                                <textarea name="answer" class="form-control answer-text-{{ $question->id }}" rows="2"
                                                                    placeholder="Write your answer..." required></textarea>
                                                                <button type="submit" class="btn btn-sm btn-success mt-2">
                                                                    <i class="fas fa-paper-plane"></i> Submit Answer
                                                                </button>
                                                            </form>

                                                            <div id="success-message-{{ $question->id }}"
                                                                class="alert alert-success mt-2 d-none">Answer submitted
                                                                successfully!</div>

                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <script>
                            $(document).ready(function() {
                                $('.answer-form').submit(function(e) {
                                    e.preventDefault();

                                    var questionId = $(this).data('id');
                                    var answerText = $('.answer-text-' + questionId).val();
                                    var form = $(this);

                                    $.ajax({
                                        url: "{{ route('answer.store', ':id') }}".replace(':id', questionId),
                                        method: "POST",
                                        data: form.serialize(),
                                        success: function(response) {
                                            if (response.success) {
                                                toastr.success('Answer submitted successfully!'); // Toast message

                                                $('#success-message-' + questionId).removeClass(
                                                    'd-none'); // Show inline success message
                                                $('#question-' + questionId).fadeOut(800, function() {
                                                    $(this).remove();
                                                }); // Remove row
                                            }
                                        },
                                        error: function(xhr) {
                                            toastr.error("Something went wrong. Please try again.");
                                        }
                                    });
                                });
                            });
                        </script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


                    @endsection

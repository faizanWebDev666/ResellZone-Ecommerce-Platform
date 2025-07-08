@extends('frontend.layouts.main')
@section('main-container')
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Bookmarks</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bookmarks</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="dashboard-content">
        <div class="container">
            <div class>
                <ul class="dashborad-menus">
                    <li>
                        <a href="dashboard.html">
                            <i class="feather-grid"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.html">
                            <i class="fa-solid fa-user"></i> <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="my-listing.html">
                            <i class="feather-list"></i> <span>My Listing</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="bookmarks.html">
                            <i class="fas fa-solid fa-heart"></i> <span>Bookmarks</span>
                        </a>
                    </li>
                    <li>
                        <a href="messages.html">
                            <i class="fa-solid fa-comment-dots"></i> <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="reviews.html">
                            <i class="fas fa-solid fa-star"></i> <span>Reviews</span>
                        </a>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fas fa-light fa-circle-arrow-left"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            @extends('layouts.app')

        @section('content')
            <div class="container">
                <h2>Your Bookmarked Products</h2>
                <div class="row">
                    @forelse ($bookmarkedProducts as $product)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>{{ $product->title }}</h5>
                                    <p>{{ $product->description }}</p>
                                    <button onclick="toggleBookmark({{ $product->id }})" class="btn btn-danger">
                                        Remove Bookmark
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>You have no bookmarks yet!</p>
                    @endforelse
                </div>
            </div>
        @endsection

        <div class="bookmarks-content grid-view featured-slider">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    <div class="card aos aos-init aos-animate" data-aos="fade-up">
                        <div class="blog-widget">
                            <div class="blog-img">
                                <a href="service-details.html">
                                    <img src="frontend/img/list/listgrid-1.jpg" class="img-fluid" alt="blog-img">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Featured</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="bloglist-content">
                                <div class="card-body">
                                    <div class="blogfeaturelink">
                                        <div class="grid-author">
                                            <img src="frontend/img/profiles/avatar-02.jpg" alt="author">
                                        </div>
                                        <div class="blog-features">
                                            <a href="javascript:void(0)"><span> <i
                                                        class="fa-regular fa-circle-stop"></i> Vehicles</span></a>
                                        </div>
                                        <div class="blog-author text-end">
                                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                                        </div>
                                    </div>
                                    <h6><a href="service-details.html">2017 Gulfsteam Ameri-lite</a></h6>
                                    <div class="blog-location-details">
                                        <div class="location-info">
                                            <i class="feather-map-pin"></i> Los Angeles
                                        </div>
                                        <div class="location-info">
                                            <i class="fa-solid fa-calendar-days"></i> 06 Oct, 2022
                                        </div>
                                    </div>
                                    <div class="amount-details">
                                        <div class="amount">
                                            <span class="validrate">$350</span>
                                            <span>$450</span>
                                        </div>
                                        <div class="ratings">
                                            <span>4.7</span> (50)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 ">
                    <div class="card aos aos-init aos-animate" data-aos="fade-up">
                        <div class="blog-widget">
                            <div class="blog-img">
                                <a href="service-details.html">
                                    <img src="frontend/img/list/listgrid-4.jpg" class="img-fluid" alt="blog-img">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Featured</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="bloglist-content">
                                <div class="card-body">
                                    <div class="blogfeaturelink">
                                        <div class="grid-author">
                                            <img src="frontend/img/profiles/avatar-03.jpg" alt="author">
                                        </div>
                                        <div class="blog-features">
                                            <a href="javascript:void(0)"><span> <i
                                                        class="fa-regular fa-circle-stop"></i> Electronics</span></a>
                                        </div>
                                        <div class="blog-author text-end">
                                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                                        </div>
                                    </div>
                                    <h6><a href="service-details.html">Fashion luxury Men date</a></h6>
                                    <div class="blog-location-details">
                                        <div class="location-info">
                                            <i class="feather-map-pin"></i> Los Angeles
                                        </div>
                                        <div class="location-info">
                                            <i class="fa-solid fa-calendar-days"></i> 08 Oct, 2022
                                        </div>
                                    </div>
                                    <div class="amount-details">
                                        <div class="amount">
                                            <span class="validrate">$250</span>
                                            <input type="number" id="amountInput" placeholder="Enter amount">
                                            <button onclick="validateAmount()">Validate</button>
                                            <p id="validationMessage" style="color: red;"></p>
                                        </div>

                                        <script>
                                            function validateAmount() {
                                                // Get the dynamically updated validrate value
                                                const validRateElement = document.querySelector('.validrate');
                                                const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                                // Get the user-entered amount
                                                const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                                const messageElement = document.getElementById('validationMessage');

                                                // Validate the entered amount
                                                if (isNaN(inputAmount)) {
                                                    messageElement.textContent = "Please enter a valid number.";
                                                    messageElement.style.color = 'red';
                                                } else if (inputAmount >= validRate + 100) {
                                                    messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                                    messageElement.style.color = 'green';
                                                } else {
                                                    messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                                    messageElement.style.color = 'red';
                                                }
                                            }
                                        </script>

                                        <input type="number" id="amountInput" placeholder="Enter amount">
                                        <button onclick="validateAmount()">Validate</button>
                                        <p id="validationMessage" style="color: red;"></p>
                                    </div>

                                    <script>
                                        function validateAmount() {
                                            // Get the dynamically updated validrate value
                                            const validRateElement = document.querySelector('.validrate');
                                            const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                            // Get the user-entered amount
                                            const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                            const messageElement = document.getElementById('validationMessage');

                                            // Validate the entered amount
                                            if (isNaN(inputAmount)) {
                                                messageElement.textContent = "Please enter a valid number.";
                                                messageElement.style.color = 'red';
                                            } else if (inputAmount >= validRate + 100) {
                                                messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                                messageElement.style.color = 'green';
                                            } else {
                                                messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                                messageElement.style.color = 'red';
                                            }
                                        }
                                    </script>

                                    <span>$350</span>
                                </div>
                                <div class="ratings">
                                    <span>4.6</span> (50)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="card aos aos-init aos-animate" data-aos="fade-up">
                <div class="blog-widget">
                    <div class="blog-img">
                        <a href="service-details.html">
                            <img src="frontend/img/list/listgrid-8.jpg" class="img-fluid" alt="blog-img">
                        </a>
                        <div class="fav-item">
                            <span class="featured-text">Featured</span>
                            <a href="javascript:void(0)" class="fav-icon">
                                <i class="feather-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bloglist-content">
                        <div class="card-body">
                            <div class="blogfeaturelink">
                                <div class="grid-author">
                                    <img src="frontend/img/profiles/avatar-04.jpg" alt="author">
                                </div>
                                <div class="blog-features">
                                    <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                            Electronics</span></a>
                                </div>
                                <div class="blog-author text-end">
                                    <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                                </div>
                            </div>
                            <h6><a href="service-details.html">Apple Iphone 6 16GB 4G LTE</a></h6>
                            <div class="blog-location-details">
                                <div class="location-info">
                                    <i class="feather-map-pin"></i> Los Angeles
                                </div>
                                <div class="location-info">
                                    <i class="fa-solid fa-calendar-days"></i> 09 Oct, 2022
                                </div>
                            </div>
                            <div class="amount-details">
                                <div class="amount">
                                    <span class="validrate">$250</span>
                                    <input type="number" id="amountInput" placeholder="Enter amount">
                                    <button onclick="validateAmount()">Validate</button>
                                    <p id="validationMessage" style="color: red;"></p>
                                </div>

                                <script>
                                    function validateAmount() {
                                        // Get the dynamically updated validrate value
                                        const validRateElement = document.querySelector('.validrate');
                                        const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                        // Get the user-entered amount
                                        const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                        const messageElement = document.getElementById('validationMessage');

                                        // Validate the entered amount
                                        if (isNaN(inputAmount)) {
                                            messageElement.textContent = "Please enter a valid number.";
                                            messageElement.style.color = 'red';
                                        } else if (inputAmount >= validRate + 100) {
                                            messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                            messageElement.style.color = 'green';
                                        } else {
                                            messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                            messageElement.style.color = 'red';
                                        }
                                    }
                                </script>

                                <input type="number" id="amountInput" placeholder="Enter amount">
                                <button onclick="validateAmount()">Validate</button>
                                <p id="validationMessage" style="color: red;"></p>
                            </div>

                            <script>
                                function validateAmount() {
                                    // Get the dynamically updated validrate value
                                    const validRateElement = document.querySelector('.validrate');
                                    const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                    // Get the user-entered amount
                                    const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                    const messageElement = document.getElementById('validationMessage');

                                    // Validate the entered amount
                                    if (isNaN(inputAmount)) {
                                        messageElement.textContent = "Please enter a valid number.";
                                        messageElement.style.color = 'red';
                                    } else if (inputAmount >= validRate + 100) {
                                        messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                        messageElement.style.color = 'green';
                                    } else {
                                        messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                        messageElement.style.color = 'red';
                                    }
                                }
                            </script>

                        </div>
                        <div class="ratings">
                            <span>4.7</span> (50)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 ">
    <div class="card aos aos-init aos-animate" data-aos="fade-up">
        <div class="blog-widget">
            <div class="blog-img">
                <a href="service-details.html">
                    <img src="frontend/img/list/listgrid-3.jpg" class="img-fluid" alt="blog-img">
                </a>
                <div class="fav-item">
                    <span class="featured-text">Featured</span>
                    <a href="javascript:void(0)" class="fav-icon">
                        <i class="feather-heart"></i>
                    </a>
                </div>
            </div>
            <div class="bloglist-content">
                <div class="card-body">
                    <div class="blogfeaturelink">
                        <div class="grid-author">
                            <img src="frontend/img/profiles/avatar-05.jpg" alt="author">
                        </div>
                        <div class="blog-features">
                            <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                    Electronics</span></a>
                        </div>
                        <div class="blog-author text-end">
                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                        </div>
                    </div>
                    <h6><a href="service-details.html">Customized Apple Imac </a></h6>
                    <div class="blog-location-details">
                        <div class="location-info">
                            <i class="feather-map-pin"></i> Los Angeles
                        </div>
                        <div class="location-info">
                            <i class="fa-solid fa-calendar-days"></i> 10 Oct, 2022
                        </div>
                    </div>
                    <div class="amount-details">
                        <div class="amount">
                            <span class="validrate">$250</span>
                            <input type="number" id="amountInput" placeholder="Enter amount">
                            <button onclick="validateAmount()">Validate</button>
                            <p id="validationMessage" style="color: red;"></p>
                        </div>

                        <script>
                            function validateAmount() {
                                // Get the dynamically updated validrate value
                                const validRateElement = document.querySelector('.validrate');
                                const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                // Get the user-entered amount
                                const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                const messageElement = document.getElementById('validationMessage');

                                // Validate the entered amount
                                if (isNaN(inputAmount)) {
                                    messageElement.textContent = "Please enter a valid number.";
                                    messageElement.style.color = 'red';
                                } else if (inputAmount >= validRate + 100) {
                                    messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                    messageElement.style.color = 'green';
                                } else {
                                    messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                    messageElement.style.color = 'red';
                                }
                            }
                        </script>

                    </div>
                    <div class="ratings">
                        <span>4.5</span> (50)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6">
    <div class="card aos aos-init aos-animate" data-aos="fade-up">
        <div class="blog-widget">
            <div class="blog-img">
                <a href="service-details.html">
                    <img src="frontend/img/list/listgrid-2.jpg" class="img-fluid" alt="blog-img">
                </a>
                <div class="fav-item">
                    <span class="featured-text">Featured</span>
                    <a href="javascript:void(0)" class="fav-icon">
                        <i class="feather-heart"></i>
                    </a>
                </div>
            </div>
            <div class="bloglist-content">
                <div class="card-body">
                    <div class="blogfeaturelink">
                        <div class="grid-author">
                            <img src="frontend/img/profiles/avatar-06.jpg" alt="author">
                        </div>
                        <div class="blog-features">
                            <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                    Construction</span></a>
                        </div>
                        <div class="blog-author text-end">
                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                        </div>
                    </div>
                    <h6><a href="service-details.html">Villa 457 sq.m. In Benidorm Fully</a></h6>
                    <div class="blog-location-details">
                        <div class="location-info">
                            <i class="feather-map-pin"></i> Los Angeles
                        </div>
                        <div class="location-info">
                            <i class="fa-solid fa-calendar-days"></i> 11 Oct, 2022
                        </div>
                    </div>
                    <div class="amount-details">
                        <div class="amount">
                            <span class="validrate">$250</span>
                            <input type="number" id="amountInput" placeholder="Enter amount">
                            <button onclick="validateAmount()">Validate</button>
                            <p id="validationMessage" style="color: red;"></p>
                        </div>

                        <script>
                            function validateAmount() {
                                // Get the dynamically updated validrate value
                                const validRateElement = document.querySelector('.validrate');
                                const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                // Get the user-entered amount
                                const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                const messageElement = document.getElementById('validationMessage');

                                // Validate the entered amount
                                if (isNaN(inputAmount)) {
                                    messageElement.textContent = "Please enter a valid number.";
                                    messageElement.style.color = 'red';
                                } else if (inputAmount >= validRate + 100) {
                                    messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                    messageElement.style.color = 'green';
                                } else {
                                    messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                    messageElement.style.color = 'red';
                                }
                            }
                        </script>

                    </div>
                    <div class="ratings">
                        <span>4.5</span> (50)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6">
    <div class="card aos aos-init aos-animate" data-aos="fade-up">
        <div class="blog-widget">
            <div class="blog-img">
                <a href="service-details.html">
                    <img src="frontend/img/list/listgrid-5.jpg" class="img-fluid" alt="blog-img">
                </a>
                <div class="fav-item">
                    <span class="featured-text">Featured</span>
                    <a href="javascript:void(0)" class="fav-icon">
                        <i class="feather-heart"></i>
                    </a>
                </div>
            </div>
            <div class="bloglist-content">
                <div class="card-body">
                    <div class="blogfeaturelink">
                        <div class="grid-author">
                            <img src="frontend/img/profiles/avatar-03.jpg" alt="author">
                        </div>
                        <div class="blog-features">
                            <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                    Jobs</span></a>
                        </div>
                        <div class="blog-author text-end">
                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                        </div>
                    </div>
                    <h6><a href="service-details.html">CDL A OTR Compnay Driver Job-N</a></h6>
                    <div class="blog-location-details">
                        <div class="location-info">
                            <i class="feather-map-pin"></i> Los Angeles
                        </div>
                        <div class="location-info">
                            <i class="fa-solid fa-calendar-days"></i> 12 Oct, 2022
                        </div>
                    </div>
                    <div class="amount-details">
                        <div class="amount">
                            <span class="validrate">$250</span>
                            <input type="number" id="amountInput" placeholder="Enter amount">
                            <button onclick="validateAmount()">Validate</button>
                            <p id="validationMessage" style="color: red;"></p>
                        </div>

                        <script>
                            function validateAmount() {
                                // Get the dynamically updated validrate value
                                const validRateElement = document.querySelector('.validrate');
                                const validRate = parseInt(validRateElement.textContent.replace('$', ''), 10); // Extract numeric value

                                // Get the user-entered amount
                                const inputAmount = parseInt(document.getElementById('amountInput').value, 10);

                                const messageElement = document.getElementById('validationMessage');

                                // Validate the entered amount
                                if (isNaN(inputAmount)) {
                                    messageElement.textContent = "Please enter a valid number.";
                                    messageElement.style.color = 'red';
                                } else if (inputAmount >= validRate + 100) {
                                    messageElement.textContent = "Valid: The amount is more than $100 above the current valid rate.";
                                    messageElement.style.color = 'green';
                                } else {
                                    messageElement.textContent = "Invalid: The amount must be at least $100 more than the valid rate.";
                                    messageElement.style.color = 'red';
                                }
                            }
                        </script>

                        <div class="ratings">
                            <span>4.7</span> (50)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6">
    <div class="card aos aos-init aos-animate" data-aos="fade-up">
        <div class="blog-widget">
            <div class="blog-img">
                <a href="service-details.html">
                    <img src="frontend/img/list/listgrid-6.jpg" class="img-fluid" alt="blog-img">
                </a>
                <div class="fav-item">
                    <span class="featured-text">Featured</span>
                    <a href="javascript:void(0)" class="fav-icon">
                        <i class="feather-heart"></i>
                    </a>
                </div>
            </div>
            <div class="bloglist-content">
                <div class="card-body">
                    <div class="blogfeaturelink">
                        <div class="grid-author">
                            <img src="frontend/img/profiles/avatar-04.jpg" alt="author">
                        </div>
                        <div class="blog-features">
                            <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                    Electronics</span></a>
                        </div>
                        <div class="blog-author text-end">
                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                        </div>
                    </div>
                    <h6><a href="service-details.html">2012 Audi R8 GT Spyder Convertibl</a></h6>
                    <div class="blog-location-details">
                        <div class="location-info">
                            <i class="feather-map-pin"></i> Los Angeles
                        </div>
                        <div class="location-info">
                            <i class="fa-solid fa-calendar-days"></i> 02 Oct, 2022
                        </div>
                    </div>
                    <div class="amount-details">
                        <div class="amount">
                            <span class="validrate">$450</span>
                            <span>$350</span>
                        </div>
                        <div class="ratings">
                            <span>4.7</span> (50)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6">
    <div class="card aos aos-init aos-animate" data-aos="fade-up">
        <div class="blog-widget">
            <div class="blog-img">
                <a href="service-details.html">
                    <img src="frontend/img/list/listgrid-7.jpg" class="img-fluid" alt="blog-img">
                </a>
                <div class="fav-item">
                    <span class="featured-text">Featured</span>
                    <a href="javascript:void(0)" class="fav-icon">
                        <i class="feather-heart"></i>
                    </a>
                </div>
            </div>
            <div class="bloglist-content">
                <div class="card-body">
                    <div class="blogfeaturelink">
                        <div class="grid-author">
                            <img src="frontend/img/profiles/avatar-07.jpg" alt="author">
                        </div>
                        <div class="blog-features">
                            <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                    Vehicles</span></a>
                        </div>
                        <div class="blog-author text-end">
                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                        </div>
                    </div>
                    <h6><a href="service-details.html">HP Gaming 15.6 TouchScreen 12G</a></h6>
                    <div class="blog-location-details">
                        <div class="location-info">
                            <i class="feather-map-pin"></i> Los Angeles
                        </div>
                        <div class="location-info">
                            <i class="fa-solid fa-calendar-days"></i> 02 Oct, 2022
                        </div>
                    </div>
                    <div class="amount-details">
                        <div class="amount">
                            <span class="validrate">$450</span>
                            <span>$350</span>
                        </div>
                        <div class="ratings">
                            <span>4.7</span> (50)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 ">
    <div class="card aos aos-init aos-animate" data-aos="fade-up">
        <div class="blog-widget">
            <div class="blog-img">
                <a href="service-details.html">
                    <img src="frontend/img/list/listgrid-1.jpg" class="img-fluid" alt="blog-img">
                </a>
                <div class="fav-item">
                    <span class="featured-text">Featured</span>
                    <a href="javascript:void(0)" class="fav-icon">
                        <i class="feather-heart"></i>
                    </a>
                </div>
            </div>
            <div class="bloglist-content">
                <div class="card-body">
                    <div class="blogfeaturelink">
                        <div class="grid-author">
                            <img src="frontend/img/profiles/avatar-02.jpg" alt="author">
                        </div>
                        <div class="blog-features">
                            <a href="javascript:void(0)"><span> <i class="fa-regular fa-circle-stop"></i>
                                    Vehicles</span></a>
                        </div>
                        <div class="blog-author text-end">
                            <span> <img src="frontend/img/eye.svg" alt="electronics">4000 </span>
                        </div>
                    </div>
                    <h6><a href="service-details.html">2017 Gulfsteam Ameri-lite</a></h6>
                    <div class="blog-location-details">
                        <div class="location-info">
                            <i class="feather-map-pin"></i> Los Angeles
                        </div>
                        <div class="location-info">
                            <i class="fa-solid fa-calendar-days"></i> 06 Oct, 2022
                        </div>
                    </div>
                    <div class="amount-details">
                        <div class="amount">
                            <span class="validrate">$350</span>
                            <span>$450</span>
                        </div>
                        <div class="ratings">
                            <span>4.7</span> (50)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-pagination">
    <nav>
        <ul class="pagination">
            <li class="page-item previtem">
                <a class="page-link" href="#"><i class="fas fa-regular fa-arrow-left"></i> Prev</a>
            </li>
            <li class="justify-content-center pagination-center">
                <div class="pagelink">
                    <ul>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">14</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="page-item nextlink">
                <a class="page-link" href="#">Next <i class="fas fa-regular fa-arrow-right"></i></a>
            </li>
        </ul>
    </nav>
</div>

</div>
</div>
</div>
</div>


@endsection

@extends('frontend.layouts.OnlyHeader')
@section('title', 'Browse Products | ResellZone')
@section('main-container')
    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #0db893, #0db893); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #0db893(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">
                        <br><br>
                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; font-family: 'Poppins';margin-top:7%; sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            ReSellZone🔄
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

    <div class="list-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 theiaStickySidebar">
                    <div class="listings-sidebar">
                        <div class="card" style="padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                            <h4 style="font-size: 18px; margin-bottom: 20px;">
                                <img src="frontend/img/details-icon.svg" alt="details-icon"
                                    style="width: 20px; vertical-align: middle; margin-right: 8px;"> Filter
                            </h4>

                            <!-- Price Filter -->
                            <div style="display: flex; gap: 5px;">
                                <input type="number" id="manualMinPrice" placeholder="From"
                                    style="flex: 1; padding: 8px; width:50%; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                                <input type="number" id="manualMaxPrice" placeholder="To"
                                    style="flex: 1; padding: 8px;width:50%; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                            </div>

                            <!-- General Filters -->
                            <br>
                            <form id="filterForm" method="GET" action="{{ url('/show-product') }}"
                                style="display: flex; flex-direction: column; gap: 15px;">
                                <div style="display: flex; flex-direction: column;">
                                    <input type="text" class="form-control" placeholder="What are you looking for?"
                                        name="query" id="nameFilter"
                                        style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                                </div>
                                <div style="display: flex; flex-direction: column;">
                                    <select name="category" class="form-control select" id="categoryFilter"
                                        style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                                        <option value="">Choose Category</option>
                                        <option value="Vehicles">Vehicles</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Fashion Style">Fashion Style</option>
                                        <option value="Health Care">Health Care</option>
                                        <option value="Job Board">Job Board</option>
                                        <option value="Mobiles">Mobiles</option>
                                        <option value="Property">Property</option>
                                        <option value="Services">Services</option>
                                        <option value="Kids">Kids</option>
                                        <option value="Books & Supports">Books & Supports</option>
                                        <option value="Pet & Animal">Pet & Animal</option>
                                        <option value="Furniture">Furniture</option>
                                    </select>
                                </div>

                                <div style="display: flex; flex-direction: column;">
                                    <input list="cities" name="city" class="form-control" id="cityFilter"
                                        style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;"
                                        placeholder="Choose or type a city">

                                    <datalist id="cities">
                                        <option value="Lahore">
                                        <option value="Karachi">
                                        <option value="Islamabad">
                                        <option value="Rawalpindi">
                                        <option value="Faisalabad">
                                        <option value="Multan">
                                        <option value="Peshawar">
                                        <option value="Quetta">
                                        <option value="Sialkot">
                                    </datalist>
                                </div>

                                <!-- Rating Filter -->
                                <div style="display: flex; flex-direction: column;">
                                    <label for="ratingFilter">Filter by Rating</label>
                                    <select name="rating" class="form-control" id="ratingFilter"
                                        style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                                        <option value="">Choose Rating</option>
                                        <option value="5">5 Stars & Above</option>
                                        <option value="4">4 Stars & Above</option>
                                        <option value="3">3 Stars & Above</option>
                                        <option value="2">2 Stars & Above</option>
                                        <option value="1">1 Star & Above</option>
                                    </select>
                                </div>

                                <input type="hidden" name="min_price" id="hiddenMinPrice">
                                <input type="hidden" name="max_price" id="hiddenMaxPrice">

                                <div style="display: flex; justify-content: space-between; gap: 10px; margin-top: 20px;">
                                    <button class="btn-stable" type="submit" id="goButton"
                                        style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                        <i class="fa fa-search" aria-hidden="true"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>









                <div class="col-lg-8">
                    <div class="row sorting-div">


                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                let goButton = document.getElementById("goButton");
                                let filterForm = document.getElementById("filterForm");

                                if (goButton && filterForm) {
                                    goButton.addEventListener("click", function(event) {
                                        event.preventDefault(); // Prevent default form submission

                                        let minPrice = document.getElementById("manualMinPrice").value || "";
                                        let maxPrice = document.getElementById("manualMaxPrice").value || "";

                                        document.getElementById("hiddenMinPrice").value = minPrice;
                                        document.getElementById("hiddenMaxPrice").value = maxPrice;

                                        filterForm.submit();
                                    });
                                }
                            });
                        </script>
                        <script>
                            document.getElementById('sortBy').addEventListener('change', function() {
                                const sortByValue = this.value;
                                const productCards = document.querySelectorAll('.product-card');
                                const sortedCards = Array.from(productCards);

                                if (sortByValue === 'priceLowToHigh') {
                                    sortedCards.sort((a, b) => parseFloat(a.getAttribute('data-price')) - parseFloat(b.getAttribute(
                                        'data-price')));
                                } else if (sortByValue === 'priceHighToLow') {
                                    sortedCards.sort((a, b) => parseFloat(b.getAttribute('data-price')) - parseFloat(a.getAttribute(
                                        'data-price')));
                                }

                                const productsContainer = document.getElementById('filteredResults');
                                productsContainer.innerHTML = '';
                                sortedCards.forEach(card => {
                                    productsContainer.appendChild(card);
                                });
                            });

                            document.getElementById('listView').addEventListener('click', function() {
                                const productCards = document.querySelectorAll('.product-card');
                                productCards.forEach(card => {
                                    card.classList.add('list-view');
                                    card.classList.remove('grid-view');
                                });
                                this.classList.add('active');
                                document.getElementById('gridView').classList.remove('active');
                            });

                            document.getElementById('gridView').addEventListener('click', function() {
                                const productCards = document.querySelectorAll('.product-card');
                                productCards.forEach(card => {
                                    card.classList.add('grid-view');
                                    card.classList.remove('list-view');
                                });
                                this.classList.add('active');
                                document.getElementById('listView').classList.remove('active');
                            });
                        </script>

                    </div>

                    <div class="container">
                        <div class="blog-listview d-flex flex-column align-items-start ms-3" id="filteredResults">
                            @foreach ($product->where('status', 'active') as $pro)
                                @php
                                    $isNewArrival = $pro->created_at >= now()->subDays(1);
                                @endphp

                                <div class="mb-3">
                                    <a href="{{ route('product-details', ['id' => $pro->id]) }}"
                                        class="text-decoration-none text-dark">
                                        <div class="card product-card shadow-sm border-0 d-flex flex-row position-relative"
                                            style="border-radius: 12px; width: 100%; cursor: pointer;">

                                            <!-- New Arrival Tag -->
                                            @if ($isNewArrival)
                                                <span class="badge bg-danger position-absolute"
                                                    style="top: 10px; left: 10px; font-size: 12px; padding: 5px 10px;">
                                                    New Arrival
                                                </span>
                                            @endif

                                            <!-- Image Section -->
                                            <div class="position-relative" style="flex: 0 0 40%; max-width: 40%;">
                                                <img src="{{ $pro->productImages->first()->product_images ?? asset('default-product.jpg') }}"
                                                    class="card-img-top" alt="product-img"
                                                    style="height: 180px; width: 100%; object-fit: cover; border-radius: 12px 0 0 12px;">
                                            </div>

                                            <!-- Details Section -->
                                            <div class="card-body p-3 d-flex flex-column justify-content-between"
                                                style="flex: 1;">
                                                <h6 class="card-title fw-bold mb-2 text-truncate">
                                                    {{ Str::limit($pro->title, 25) }}
                                                </h6>
                                                <p class="small text-muted mb-1"><i class="fa fa-map-marker-alt"></i>
                                                    {{ $pro->city ?? 'N/A' }} | {{ $pro->type ?? 'N/A' }}</p>

                                                @php
                                                    $adjustedPrice =
                                                        ($pro->price ?? 0) > 200 ? $pro->price - 200 : $pro->price ?? 0;
                                                @endphp
                                                <span
                                                    class="fw-bold text-danger fs-5">PKR {{ number_format($adjustedPrice, 2) }}</span>
                                                <small
                                                    class="text-muted"><del>PKR {{ number_format($pro->price ?? 0, 2) }}</del></small>

                                                <p class="ratings text-warning mt-1">
                                                    <i class="fa fa-star"></i>
                                                    {{ round($pro->ratings_avg_rating ?? 0, 1) }}
                                                    ({{ $pro->reviews_count ?? 0 }} Reviews)
                                                    |
                                                    👁️ {{ $pro->views ?? 0 }} Views
                                                </p>

                                                <button type="button"
                                                    onclick="addToWishlist(event, {{ $pro->id }})"
                                                    style="position: absolute; top: 10px; right: 10px; border: none; background: none;">
                                                    <i id="heart-icon-{{ $pro->id }}"
                                                        class="fa {{ in_array($pro->id, $wishlistItems) ? 'fa-heart' : 'far fa-heart' }} text-danger"
                                                        style="font-size: 24px;"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center mt-4">
                                {{ $product->links('vendor.pagination.showproduct-pagination') }}
                            </div>


                        </div>
                    </div>

                    <script>
                        function addToWishlist(event, productId) {
                            event.preventDefault(); // Prevent form submission

                            var userId = '{{ session()->get('id') }}'; // Get user ID from session

                            // Check if user is logged in
                            if (!userId || userId === 'null') {
                                window.location.href = "{{ URL::to('login') }}"; // Redirect to login page
                                return;
                            }

                            var heartIcon = document.getElementById("heart-icon-" + productId);

                            var formData = new FormData();
                            formData.append('user_id', userId);
                            formData.append('id', productId);
                            formData.append('_token', '{{ csrf_token() }}');

                            fetch("{{ URL::to('addToWishlist') }}", {
                                    method: "POST",
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === 'added') {
                                        heartIcon.classList.remove("far");
                                        heartIcon.classList.add("fa");
                                    } else {
                                        heartIcon.classList.remove("fa");
                                        heartIcon.classList.add("far");
                                    }
                                    console.log(data.message);
                                })
                                .catch(error => {
                                    console.error("Error:", error);
                                });
                        }
                    </script>
                    <script>
                        const priceRangeInput = document.getElementById('priceRange');
                        const priceRangeMin = document.getElementById('priceRangeMin');
                        const priceRangeMax = document.getElementById('priceRangeMax');

                        priceRangeInput.addEventListener('input', function() {
                            const priceValue = priceRangeInput.value;
                            priceRangeMin.textContent = priceValue;
                            priceRangeMax.textContent = priceValue;
                        });

                        document.getElementById('searchButton').addEventListener('click', function() {
                            const nameFilter = document.getElementById('nameFilter').value.toLowerCase();
                            const categoryFilter = document.getElementById('categoryFilter').value.toLowerCase();
                            const locationFilter = document.getElementById('locationFilter').value.toLowerCase();
                            const maxPrice = priceRangeInput.value;

                            const productCards = document.querySelectorAll('.product-card');
                            productCards.forEach(card => {
                                const productPrice = card.getAttribute('data-price');
                                const productName = card.getAttribute('data-name').toLowerCase();
                                const productLocation = card.getAttribute('data-location').toLowerCase();
                                const productCategory = card.getAttribute('data-category').toLowerCase();

                                // Apply the filters
                                if (
                                    (nameFilter === '' || productName.includes(nameFilter)) &&
                                    (categoryFilter === '' || productCategory.includes(categoryFilter)) &&
                                    (locationFilter === '' || productLocation.includes(locationFilter)) &&
                                    (maxPrice === '' || productPrice <= maxPrice)
                                ) {
                                    card.style.display = 'block';
                                } else {
                                    card.style.display = 'none';
                                }
                            });
                        });

                        document.getElementById('resetButton').addEventListener('click', function() {
                            document.getElementById('filterForm').reset();
                            priceRangeMin.textContent = '0';
                            priceRangeMax.textContent = '5000000';
                            const productCards = document.querySelectorAll('.product-card');
                            productCards.forEach(card => {
                                card.style.display = 'block';
                            });
                        });
                    </script>
                  <style>
                    .container {
    max-width: 1100px; /* Increase width */
    width: 100%;
    margin: auto;
    transition: transform 0.3s ease;
}

/* Ensure blog list view takes the full width */
.blog-listview {
    width: 100%;
}

/* Product card */
.product-card {
    background-color: #fff;
    border: 2px solid #800000; /* Adds a border with your website's primary color */
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    width: 100%; 
}

/* Zoom-out effect on hover */
.product-card:hover {
    transform: scale(0.95); /* Slightly shrink on hover */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); /* Reduce shadow */
}

                  </style>
                @endsection

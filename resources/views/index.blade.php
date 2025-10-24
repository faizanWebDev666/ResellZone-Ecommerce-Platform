@extends('frontend.layouts.main')
@section('title', 'Home')
@section('main-container')
    </head>
    <body>
        <section class="banner-section banner-seven">
            <div class="container">
                <div class="home-banner">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="section-search aos" data-aos="fade-up">
                                <p>Find the best deals on top products.</p>
                                <h1>Shop Smarter, Buy Better</h1>
                            </div>
                            <div class="banner-imgs aos" data-aos="fade-up">
                                <div class="main-banner-1">
                                    <img src="frontend/img/logonew.png" class="img-fluid" alt="bannerimage"
                                        style="transform: scale(1.5); width: 100%; height: auto; position: relative; top: -100px; transition: transform 0.3s ease-in-out;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="foods-title aos" data-aos="fade-up">
                        <a href="{{ route('show-product', ['category' => 'Electronics']) }}">Electronics</a>
                        <a href="{{ route('show-product', ['category' => 'fashion style']) }}">Fashion</a>
                        <a href="{{ route('show-product', ['category' => 'Vehicles']) }}">Vehicles</a>
                        <a href="{{ route('show-product', ['category' => 'mobiles']) }}">Mobiles</a>
                    </div>

                    <a href="{{ route('show-product') }}" class="cta"
                        style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);">
                        <span>Shop Now</span>
                        <svg width="20px" height="20px" viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>

                <style>
                    .cta {
                        position: relative;
                        padding: 12px 18px;
                        transition: all 0.2s ease;
                        border: none;
                        background: none;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 8px;
                        text-decoration: none;
                        overflow: hidden;
                    }

                    .cta:before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        display: block;
                        border-radius: 50px;
                        background: #C40032;
                        width: 43px;
                        height: 45px;
                        transition: all 0.3s ease;
                    }

                    .cta span {
                        position: relative;
                        font-family: "Ubuntu", sans-serif;
                        font-size: 18px;
                        font-weight: 700;
                        letter-spacing: 0.05em;
                        color: white;
                        z-index: 1;
                    }

                    .cta svg {
                        position: relative;
                        top: 1px;
                        fill: none;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke: white;
                        stroke-width: 2;
                        transform: translateX(-5px);
                        transition: all 0.3s ease;
                        z-index: 1;
                    }

                    .cta:hover:before {
                        width: 100%;
                        background: #C40032;
                    }

                    .cta:hover svg {
                        transform: translateX(0);
                    }

                    .cta:active {
                        transform: scale(0.95);
                    }
                </style>

            </div>
        </section>
 <!-- Category Section -->
    <div class="py-5" style="background-color: #f7f9fc;">
        <div class="container text-center">
            <h2 class="fw-bold display-6 mb-2">Browse Our <span class="text-primary">Categories</span></h2>
            <p class="text-muted mb-5">Find your desired products from various sections</p>

            <div class="row g-4">
                @php
                    $categories = [
                        ['name' => 'Vehicles', 'img' => 'vehicles.png', 'icon' => 'fa-car'],
                        ['name' => 'Electronics', 'img' => 'electronics.png', 'icon' => 'fa-laptop'],
                        ['name' => 'Fashion Style', 'img' => 'fashion.png', 'icon' => 'fa-tshirt'],
                        ['name' => 'Health Care', 'img' => 'health.png', 'icon' => 'fa-heartbeat'],
                        ['name' => 'Job Board', 'img' => 'job.png', 'icon' => 'fa-briefcase'],
                        ['name' => 'Mobiles', 'img' => 'mobiles.png', 'icon' => 'fa-mobile-alt'],
                        ['name' => 'Real Estate', 'img' => 'estates.png', 'icon' => 'fa-home'],
                        ['name' => 'Services', 'img' => 'travels.png', 'icon' => 'fa-concierge-bell'],
                        ['name' => 'Kids', 'img' => 'sports.png', 'icon' => 'fa-child'],
                        ['name' => 'Books', 'img' => 'magznes.png', 'icon' => 'fa-book'],
                        ['name' => 'Pet & Animal', 'img' => 'pets.png', 'icon' => 'fa-paw'],
                        ['name' => 'Furniture', 'img' => 'furniture.png', 'icon' => 'fa-couch'],
                    ];
                @endphp

                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('show-product', ['category' => strtolower($category['name'])]) }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm rounded-4 h-100 text-center category-card transition">
                                <div class="card-body py-4">
                                    <!-- Image with fallback to icon -->
                                    <div class="icon-container">
                                        <img src="{{ asset('frontend/img/icons/index/' . $category['img']) }}"
                                             alt="{{ $category['name'] }}"
                                             class="category-img"
                                             onerror="this.style.display='none'; document.getElementById('icon-{{ $loop->index }}').style.display='block';">
                                        <div id="icon-{{ $loop->index }}" class="icon-placeholder" style="display: none;">
                                            <i class="fas {{ $category['icon'] }} text-primary"></i>
                                        </div>
                                    </div>
                                    <h6 class="fw-semibold text-dark">{{ $category['name'] }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

     <style>
        
                /* Zoom-out effect */
                .zoom-out {
                    transform: scale(0.95);
                    /* Shrinks the whole section */
                    transform-origin: center;
                }

                /* Adjust text size */
                .category-links h5 {
                    font-size: 14px;
                    /* Reduce text size */
                }

                /* Adjust image size */
                .category-links img {
                    width: 50px;
                    /* Smaller images */
                    height: auto;
                }

                /* Center align categories */
                .category-container {
                    display: flex;
                    justify-content: center;
                }

                /* Category Section Header */
                .category-section {
                    margin-top: 30px;
                    text-align: center;
                }

                .section-heading h2 {
                    font-size: 28px;
                    font-weight: bold;
                    color: #333;
                }

                .section-heading span {
                    color: #ff6600;
                    /* Highlight color */
                }

                .section-heading p {
                    font-size: 16px;
                    color: #666;
                }
            </style>
            <!-- Section Start -->
            <section>
    <div class="section-heading">
        <div class="container">
            <div class="row zoom-out">
                <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                    <h2>Lat<span class="title-right">est</span> Products</h2>
                    <p>Explore our latest products and discover trending new arrivals.</p>
                </div>
                <div class="col-md-6 text-md-end aos aos-init aos-animate" data-aos="fade-up">
                    <a href="{{ URL::to('show-product') }}"
                        class="btn btn-maroon text-white px-4 py-2 rounded-3">View All</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Display Section -->
    <div class="container my-5">
        <div class="row zoom-out" id="product-section" style="display: none;">
            @foreach ($product->where('status', 'active') as $pro)
                <div class="col-6 col-md-3 col-lg-3 mb-4">
                    <div class="card border-0 shadow-sm h-100"
                        style="border-radius: 12px; overflow: hidden; cursor: pointer; transition: all 0.3s ease-in-out;"
                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0,0,0,0.2)';"
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.1)';">

                        <a href="{{ route('product-details', ['id' => $pro->id]) }}"
                            class="text-decoration-none text-dark">
                            <div class="position-relative">
                                <img src="{{ $pro->productImages->first()->product_images ?? asset('images/default.jpg') }}"
                                    class="card-img-top" alt="Product Image"
                                    style="height: 190px; object-fit: cover;">
                            </div>

                            <div class="card-body text-center p-2">
                                <h6 class="fw-bold text-truncate mb-1" style="font-size: 14px;">
                                    {{ Str::limit($pro->title, 30) }}
                                </h6>
                                <p class="small text-muted mb-1" style="font-size: 12px;">
                                    <i class="fa fa-map-marker-alt"></i> {{ $pro->city ?? 'N/A' }}
                                </p>

                                @php
                                    $adjustedPrice =
                                        ($pro->price ?? 0) > 200 ? $pro->price - 200 : $pro->price ?? 0;
                                @endphp
                                <div class="d-flex justify-content-center align-items-center">
                                    <span class="fw-bold text-danger me-2 fs-5">
                                        PKR {{ number_format($adjustedPrice, 2) }}
                                    </span>
                                    <small
                                        class="text-muted"><del>${{ number_format($pro->price ?? 0, 2) }}</del></small>
                                </div>

                               
                            </div>
                        </a>

                        <button type="button" onclick="addToWishlist(event, {{ $pro->id }})"
                            style="position: absolute; top: 10px; right: 10px; border: none; background: none;">
                            <i id="heart-icon-{{ $pro->id }}"
                                class="fa {{ in_array($pro->id, $wishlistItems) ? 'fa-heart' : 'far fa-heart' }} text-danger"
                                style="font-size: 24px;"></i>
                        </button>
                         <!-- Quick View Button -->
                               <div class="text-center mt-2">
    <button class="btn btn-sm btn-outline-primary"
        data-bs-toggle="modal"
        data-bs-target="#quickViewModal"
        data-title="{{ $pro->title }}"
        data-city="{{ $pro->city ?? 'N/A' }}"
        data-description="{{ $pro->description ?? 'N/A' }}"
        data-price="PKR {{ number_format($pro->price ?? 0, 2) }}"
        data-image="{{ $pro->productImages->first()->product_images ?? asset('images/default.jpg') }}">
        Quick View
    </button>
</div>

                    </div>
                    
                </div>
            @endforeach
        </div>

        <!-- Quick View Modal (Static Content for Now) -->
<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border-radius: 12px;">
      <div class="modal-header">
        <h5 class="modal-title" id="quickViewLabel">Product Quick View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Product Image -->
          <div class="col-md-6">
            <img id="quickViewImage"
                 src=""
                 class="img-fluid rounded"
                 alt="Product Image">
          </div>

          <!-- Product Info -->
          <div class="col-md-6">
            <h4 id="quickViewTitle">Product Title</h4>
            <p class="text-muted" id="quickViewCity">City / Location</p>
            <h5 class="text-danger" id="quickViewPrice">PKR 0</h5>
            <p class="small" id="quickViewDescription">This is a short description of the product for quick view purposes.</p>

            <div class="d-flex gap-2">
              <button class="btn btn-primary">Add to Cart</button>
              <button class="btn btn-outline-danger">
                <i class="fa fa-heart"></i> Wishlist
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var quickViewModal = document.getElementById('quickViewModal');
    quickViewModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var title = button.getAttribute('data-title');
        var city = button.getAttribute('data-city');
        var price = button.getAttribute('data-price');
        var image = button.getAttribute('data-image');
        var description = button.getAttribute('data-description');


        document.getElementById('quickViewTitle').innerText = title;
        document.getElementById('quickViewCity').innerText = city;
        document.getElementById('quickViewPrice').innerText = price;
        document.getElementById('quickViewImage').src = image;
        document.getElementById('quickViewDescription').innerText = description;
    });
});
</script>

        <!-- Skeleton Loader -->
        <div class="row zoom-out" id="skeleton-loader">
            @for ($i = 0; $i < 8; $i++)
                <div class="col-6 col-md-3 col-lg-3 mb-4">
                    <div class="card border-0 shadow-sm h-100 skeleton-card">
                        <div class="skeleton-image"></div>
                        <div class="card-body text-center p-2">
                            <div class="skeleton-line mb-2" style="width: 80%; height: 14px;"></div>
                            <div class="skeleton-line mb-1" style="width: 50%; height: 12px;"></div>
                            <div class="skeleton-line mb-2" style="width: 60%; height: 14px;"></div>
                            <div class="skeleton-line mb-1" style="width: 40%; height: 12px;"></div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4" id="pagination-wrapper" style="display: none;">
            <nav>
                {{ $product->appends(['top_rated_page' => request('top_rated_page')])->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>

    <!-- No Products Found Alert -->
    @if ($product->isEmpty())
        <div class="container my-5" style="background-color: #C40032;">
            <div class="alert alert-warning text-center shadow-sm"
                style="background-color: #C40032; border-color: #C40032; color: white;">
                No products found.
            </div>
        </div>
    @endif
</section>



            <!-- Skeleton CSS -->
            <style>
                .skeleton-card {
                    border-radius: 12px;
                    overflow: hidden;
                    background-color: #f0f0f0;
                    animation: pulse 1.5s infinite;
                }

                .skeleton-image {
                    height: 190px;
                    background-color: #e0e0e0;
                }

                .skeleton-line {
                    background-color: #e0e0e0;
                    margin: 5px 0;
                    border-radius: 4px;
                }

                @keyframes pulse {
                    0% {
                        background-color: #f0f0f0;
                    }

                    50% {
                        background-color: #e0e0e0;
                    }

                    100% {
                        background-color: #f0f0f0;
                    }
                }
            </style>

            <section>
                <div class="section-heading">
                    <div class="container">
                        <div class="row zoom-out">
                            <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                                <h2>Top Revie<span class="title-right">wed</span> Items</h2>
                                <p>Check out the top-reviewed items loved by our customers.</p>

                            </div>

                        </div>
                    </div>
                </div>

                @if (isset($productwithrating) && $productwithrating->count() > 0)
                    <div class="container my-5">
                        <div class="row zoom-out">
                            @foreach ($productwithrating as $pro)
                                <div class="col-6 col-md-3 col-lg-3 mb-4">
                                    <div class="card border-0 shadow-sm h-100"
                                        style="border-radius: 12px; overflow: hidden; cursor: pointer; transition: all 0.3s ease-in-out;"
                                        onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0,0,0,0.2)';"
                                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.1)';">

                                        <a href="{{ route('product-details', ['id' => $pro->id]) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="position-relative">
                                                <img src="{{ optional($pro->productImages->first())->product_images ?? asset('images/default.jpg') }}"
                                                    class="card-img-top" alt="Product Image"
                                                    style="height: 190px; object-fit: cover;">
                                            </div>

                                            <div class="card-body text-center p-2">
                                                <h6 class="fw-bold text-truncate mb-1" style="font-size: 14px;">
                                                    {{ Str::limit($pro->title, 30) }}
                                                </h6>
                                                <p class="small text-muted mb-1" style="font-size: 12px;">
                                                    <i class="fa fa-map-marker-alt"></i> {{ $pro->city ?? 'N/A' }}
                                                </p>

                                                @php
                                                    $adjustedPrice =
                                                        ($pro->price ?? 0) > 200 ? $pro->price - 200 : $pro->price ?? 0;
                                                @endphp
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <span class="fw-bold text-danger me-2 fs-5">
                                                        PKR {{ number_format($adjustedPrice, 2) }}
                                                    </span>
                                                    <small
                                                        class="text-muted"><del>${{ number_format($pro->price ?? 0, 2) }}</del></small>
                                                </div>

                                                <div class="text-warning mt-1">
                                                    ⭐ {{ number_format($pro->ratings_avg_rating, 1) }}
                                                    ({{ $pro->reviews_count ?? 0 }} Reviews)
                                                </div>
                                            </div>
                                              
                                        </a>

                                      <button type="button" onclick="addToWishlist(event, {{ $pro->id }})"
    style="position: absolute; top: 10px; right: 10px; border: none; background: none;">
    <i id="heart-icon-{{ $pro->id }}"
        class="fa {{ isset($wishlistItems) && in_array($pro->id, $wishlistItems) ? 'fa-heart' : 'far fa-heart' }} text-danger"
        style="font-size: 24px;"></i>
</button>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            <nav>
                                {{ $productwithrating->appends(['products_page' => request('products_page')])->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>
                    </div>
                @else
                    <div class="container my-5" style="background-color: #C40032;">
                        <div class="alert alert-warning text-center shadow-sm"
                            style="background-color: #C40032; border-color: #C40032; color: white;">
                            No products found.
                        </div>
                    </div>
                @endif
            </section>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    setTimeout(function() {
                        document.getElementById('skeleton-loader').style.display = 'none';
                        document.getElementById('product-section').style.display = 'flex';
                        document.getElementById('pagination-wrapper').style.display = 'flex';
                    }, 2000); // 2 seconds delay for demo; adjust as needed
                });
            </script>

            <script>
                function addToWishlist(event, productId) {
                    event.preventDefault(); // Prevent form submission

                    var userId = '{{ session()->get('id') }}'; // Get user ID from session

                    if (!userId) {
                        // If user is not logged in, redirect to login page
                        window.location.href = "{{ route('login') }}";
                        return;
                    }

                    var formData = new FormData();
                    formData.append('user_id', userId);
                    formData.append('id', productId);
                    formData.append('_token', '{{ csrf_token() }}'); // Include CSRF token

                    fetch("{{ URL::to('addToWishlist') }}", {
                            method: "POST",
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Check the status and update the heart icon
                            var heartIcon = document.getElementById("heart-icon-" + productId);
                            if (data.status === 'added') {
                                heartIcon.classList.remove("far");
                                heartIcon.classList.add("fa");
                            } else {
                                heartIcon.classList.remove("fa");
                                heartIcon.classList.add("far");
                            }
                            console.log(data.message); // Optional: Show message in the console or alert
                        })
                        .catch(error => {
                            console.error("Error:", error);
                        });
                }
            </script>
            <!-- Top Rated Products Section -->
            <!-- Use Bootstrap classes for maroon theme -->
            <style>
                .btn-maroon {
                    background-color: #C40032;
                    border: none;
                    transition: background-color 0.3s ease, transform 0.3s ease;
                }

                .btn-maroon:hover {
                    background-color: #C40032;
                    transform: scale(1.05);
                }

                .pagination .page-item .page-link {
                    color: #C40032;
                    border-color: #C40032;
                    font-weight: bold;
                }

                .pagination .page-item.active .page-link {
                    background-color: #C40032;
                    border-color: #C40032;
                    color: white;
                }

                .pagination .page-item:hover .page-link {
                    background-color: #C40032;
                    border-color: #C40032;
                }
            </style>



            <style>
                /* Section Styling */
                .testimonial-section {
                    text-align: center;
                    padding: 60px 20px;
                    background: transparent;
                    border-radius: 20px;
                    margin: 30px auto;
                    max-width: 95%;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                }

                .testimonial-section h2 {
                    font-size: 36px;
                    font-weight: 700;
                    margin-bottom: 30px;
                    color: white;
                    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
                }

                /* Slider Styling */
                .testimonial-slider {
                    display: flex;
                    gap: 20px;
                    overflow-x: auto;
                    scroll-behavior: smooth;
                    padding: 20px;
                }

                .testimonial-slider::-webkit-scrollbar {
                    display: none;
                }

                /* Testimonial Card Styling */
                .testimonial-card {
                    flex: 0 0 300px;
                    background-color: rgb(249, 229, 235);
                    /* Soft pink background */
                    background-image: radial-gradient(rgb(150, 150, 150) 1px, transparent 1px);
                    /* Dotted pattern */
                    background-size: 20px 20px;
                    /* Adjust spacing between dots */
                    border-radius: 15px;
                    padding: 30px;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                    transition: all 0.4s ease;
                }


                .testimonial-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
                }

                .feedback-image {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                    margin-bottom: 15px;
                    border: 5px solid #0db893;
                    object-fit: cover;
                }

                .testimonial-card h3 {
                    font-size: 24px;
                    font-weight: 600;
                    color: #c88b16;
                    margin-bottom: 10px;
                }

                .feedback-title {
                    font-size: 18px;
                    color: #c88b16;
                    margin-bottom: 15px;
                }

                .feedback-review {
                    font-size: 16px;
                    color: #c88b16;
                    line-height: 1.8;
                }

                /* Navigation Buttons */
                .testimonial-nav-btn {
                    background: linear-gradient(45deg, #0db893, #0db893);
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 25px;
                    font-size: 16px;
                    cursor: pointer;
                    margin: 10px;
                    transition: background 0.3s, box-shadow 0.3s;
                }

                .testimonial-nav-btn:hover {
                    background: linear-gradient(45deg, #0056b3, #003f82);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                }
            </style>

            <script>
                const slider = document.getElementById('testimonial-slider');

                function nextSlide() {
                    slider.scrollBy({
                        left: 320,
                        behavior: 'smooth'
                    });
                }

                function prevSlide() {
                    slider.scrollBy({
                        left: -320,
                        behavior: 'smooth'
                    });
                }

                let autoScroll = setInterval(nextSlide, 6000);

                slider.addEventListener('mouseover', () => clearInterval(autoScroll));
                slider.addEventListener('mouseleave', () => {
                    autoScroll = setInterval(nextSlide, 6000);
                });
            </script>



        @endsection

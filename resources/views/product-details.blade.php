@extends('frontend.layouts.main')
@section('title', 'Product Details | ResellZone')
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
                            Product Details
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
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


    @switch($product->category)
     @case('mobiles')
        @case('Electronics')
        @case('health care')
        @case('job board')
        @case('kids')
        @case('books & supports')
        @case('pet & animal')
        @case('furniture')
        @case('fashion style')
            <section class="details-description py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-center">
                            <div class="product-image">
                                <img class="img-fluid rounded shadow-lg"
                                    src="{{ $product->productImages->first()->product_images ?? asset('default-product.jpg') }}"
                                    alt="Product Image">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="product-info">
                                <h2 class="product-title font-weight-bold text-dark">{{ $product->title }}</h2>
                                <div class="rating d-flex align-items-center mb-3">
                                    @php
                                        $averageRating = round($product->ratings->avg('rating'), 1);
                                        $totalReviews = $product->ratings->count();
                                    @endphp

                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-secondary' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="ml-2 text-muted">
                                        {{ $averageRating }} / 5 ({{ $totalReviews }} Reviews)
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <h3 class="text-danger font-weight-bold mb-0">PKR {{ number_format($product->price) }}</h3>
                                    <small class="text-muted">Fixed Price</small>
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-primary">
                                        <i class="fas fa-store"></i> Store Name:
                                        {{ $product->sellerRegistration->store_name ?? 'Unknown Store' }}
                                    </h5>
                                </div>

                                <div class="mb-3">
                                    <span class="badge bg-dark p-2">
                                        <i class="fas fa-tag"></i> {{ $product->category ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <span class="text-muted"><i class="fas fa-eye"></i> {{ $product->views }} Views</span>
                                </div>

                                <form id="addToCartForm" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <div class="d-flex align-items-center mb-4">
                                        <label for="quantity" class="me-3 font-weight-bold">Quantity:</label>
                                        <div class="input-group" style="width: 140px;">
                                            <button type="button" class="btn btn-outline-dark rounded-start px-3"
                                                onclick="updateQuantity(-1)">−</button>
                                            <input type="number" name="quantity" id="quantity"
                                                class="form-control text-center fw-bold border-0 shadow-sm" value="1"
                                                min="1" style="max-width: 50px; background-color: #f8f9fa;">
                                            <button type="button" class="btn btn-outline-dark rounded-end px-3"
                                                onclick="updateQuantity(1)">+</button>
                                        </div>
                                    </div>



                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                    <div class="d-flex flex-wrap gap-3">
                                        <button type="submit" class="btn btn-danger flex-grow-1">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </button>
                                        <a href="{{ route('buyNow', ['productId' => $product->id]) }}"
                                            class="btn btn-success flex-grow-1">
                                            <i class="fas fa-credit-card"></i> Buy Now
                                        </a>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @break

        @case('Vehicles')
            <section class="details-description py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 text-center">
                            <div class="product-image">
                                <img class="img-fluid rounded shadow-lg"
                                    src="{{ $product->productImages->first()->product_images ?? asset('default-product.jpg') }}"
                                    alt="Product Image">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="product-info">
                                <h2 class="product-title font-weight-bold text-dark">{{ $product->title }}</h2>
                                <div class="rating d-flex align-items-center mb-3">
                                    @php
                                        $averageRating = round($product->ratings->avg('rating'), 1);
                                        $totalReviews = $product->ratings->count();
                                    @endphp

                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-secondary' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="ml-2 text-muted">
                                        {{ $averageRating }} / 5 ({{ $totalReviews }} Reviews)
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <h3 class="text-danger font-weight-bold mb-0">PKR {{ number_format($product->price) }}</h3>
                                    <small class="text-muted">Fixed Price</small>
                                </div>
                                <div class="mb-3">
                                    <h5 class="text-primary">
                                        <i class="fas fa-store"></i> Store:
                                        {{ $product->sellerRegistration->store_name ?? 'Unknown Store' }}
                                    </h5>
                                </div>

                                <div class="mb-3">
                                    <span class="badge bg-dark p-2">
                                        <i class="fas fa-tag"></i> {{ $product->category ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <span class="text-muted"><i class="fas fa-eye"></i> {{ $product->views }} Views</span>
                                </div>

                                <form id="addToCartForm" method="POST" class="add-to-cart-form">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="tel:{{ $product->phone_number }}" class="btn btn-outline-primary flex-grow-1">
                                            <i class="fas fa-phone-alt"></i> Contact Seller
                                        </a>

                                        <a href="{{ route('buyNow', ['productId' => $product->id]) }}"
                                            class="btn btn-success flex-grow-1">
                                            <i class="fas fa-calendar-check"></i> Reserve Now
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @break

        @case('services')
            <section class="details-description py-5">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-lg-5 text-center">
                            <div class="product-image">
                                <img class="img-fluid rounded shadow-lg"
                                    src="{{ $product->productImages->first()->product_images ?? asset('default-service.jpg') }}"
                                    alt="Service Image">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="product-info">
                                <h2 class="product-title font-weight-bold text-dark">{{ $product->title }}</h2>

                                <div class="rating d-flex align-items-center mb-3">
                                    @php
                                        $averageRating = round($product->ratings->avg('rating'), 1);
                                        $totalReviews = $product->ratings->count();
                                    @endphp



                                </div>

                                <div class="mb-3">
                                    <h3 class="text-success font-weight-bold mb-0">PKR {{ number_format($product->price) }}</h3>
                                    <small class="text-muted">Service Fee</small>
                                </div>

                                <div class="mb-3">
                                    <h5 class="text-primary">
                                        <i class="fas fa-user-tie"></i> Service Provider:
                                        {{ $product->sellerRegistration->store_name ?? 'Unknown Provider' }}
                                    </h5>
                                </div>

                                <div class="mb-3">
                                    <span class="badge bg-dark p-2">
                                        <i class="fas fa-briefcase"></i> {{ $product->category ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <div class="mb-3">
                                    <span class="text-muted"><i class="fas fa-eye"></i> {{ $product->views }} Views</span>
                                </div>

                                <div class="mb-4">
                                    <h5 class="text-dark">Service Description:</h5>
                                    <p class="text-muted">{{ $product->description ?? 'No description available.' }}</p>
                                </div>

                                <form id="addToCartForm" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}" />
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="tel:{{ $product->phone_number }}" class="btn btn-outline-primary flex-grow-1">
                                            <i class="fas fa-phone-alt"></i> Contact Provider
                                        </a>

                                        <a href="{{ route('chat.ajax', ['receiverId' => $product->sellerRegistration->user_id]) }}"
                                            class="btn btn-outline-secondary flex-grow-1">
                                            <i class="fas fa-comments"></i> Chat with Provider
                                        </a>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @break

       
        @case('property')
            <section class="details-description py-5">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-lg-5 text-center mb-4 mb-lg-0">
                            <div class="product-image">
                                <img class="img-fluid rounded shadow-lg"
                                    src="{{ $product->productImages->first()->product_images ?? asset('default-property.jpg') }}"
                                    alt="Property Image">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="product-info">
                                <h2 class="product-title font-weight-bold text-dark">{{ $product->title }}</h2>

                                <div class="rating d-flex align-items-center mb-3">
                                    @php
                                        $averageRating = round($product->ratings->avg('rating'), 1);
                                        $totalReviews = $product->ratings->count();
                                    @endphp

                                    <div class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-secondary' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="ml-2 text-muted">
                                        {{ $averageRating }} / 5 ({{ $totalReviews }} Reviews)
                                    </span>
                                </div>

                                {{-- Price Section --}}
                                <div class="mb-3">
                                    <h4 class="text-dark font-weight-bold mb-1">Property Price</h4>
                                    <h3 class="text-danger font-weight-bold">PKR {{ number_format($product->price) }}</h3>
                                </div>

                                {{-- Seller or Agent --}}
                                <div class="mb-3">
                                    <h5 class="text-primary">
                                        <i class="fas fa-user-tie"></i> Listed By:
                                        {{ $product->sellerRegistration->store_name ?? 'Unknown Agent' }}
                                    </h5>
                                </div>

                                {{-- Category Badge --}}
                                <div class="mb-3">
                                    <span class="badge bg-dark p-2">
                                        <i class="fas fa-building"></i> {{ $product->category ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                {{-- Views --}}
                                <div class="mb-3">
                                    <span class="text-muted"><i class="fas fa-eye"></i> {{ $product->views }} Views</span>
                                </div>

                                {{-- Property Description --}}
                                <div class="mb-4">
                                    <h5 class="text-dark">Property Description:</h5>
                                    <p class="text-muted">{{ $product->description ?? 'No description available.' }}</p>
                                </div>

                                {{-- Contact and Book Buttons --}}
                                <div class="d-flex flex-wrap gap-3">
                                    <a href="tel:{{ $product->phone_number }}" class="btn btn-outline-primary flex-grow-1">
                                        <i class="fas fa-phone-alt"></i> Contact Agent
                                    </a>

                                    <a href="{{ route('buyNow', ['productId' => $product->id]) }}"
                                        class="btn btn-success flex-grow-1">
                                        <i class="fas fa-calendar-check"></i> Schedule Visit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @break

        @case('books')
        @break

        @case('books')
        @break

        @case('books')
        @break

        @case('books')
        @break

        @case('books')
        @break

    @endswitch







    <script>
        document.getElementById('addToCartForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            var formData = new FormData(this); // Create a FormData object from the form

            // Make AJAX request to add to cart
            fetch("{{ URL::to('addtocart') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Item added to cart successfully!');

                        document.getElementById('cartCount').innerText = data.cartCount;
                    } else {
                        alert(data.message || 'Failed to add item to cart');
                    }
                })

        });

        function updateQuantity(amount) {
            var quantityInput = document.querySelector('input[name="quantity"]');
            var currentValue = parseInt(quantityInput.value) || 1;
            var newValue = currentValue + amount;

            if (newValue >= 1) {
                quantityInput.value = newValue;
            }
        }
    </script>

    <div class="container mt-5">
        <div class="card shadow-sm border-danger">

            <div class="card-body text-center">
                @if ($product->productImages->count() > 0)
                    <div id="productCarousel" class="carousel slide mx-auto" data-bs-ride="carousel"
                        style="max-width: 500px;">
                        <div class="carousel-inner">
                            @foreach ($product->productImages->take(10) as $key => $image)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ $image->product_images }}"
                                        class="d-block w-100 img-fluid rounded shadow-sm"
                                        style="max-height: 300px; object-fit: cover;" alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                        <!-- Navigation Arrows -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                @else
                    <p class="text-muted">No images available</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Product Details Card -->
        <div class="card shadow-sm border-danger">
            <div class="card-header bg-white border-bottom">
                <h4 class="mb-0 text-danger">Product Details</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <tbody>

                            @if (!empty($product->type))
                                <tr>
                                    <th><i class="fas fa-list-alt"></i> Type</th>
                                    <td>{{ $product->type }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->price))
                                <tr>
                                    <th><i class="fas fa-dollar-sign"></i> Price</th>
                                    <td><strong class="text-success">PKR {{ number_format($product->price) }}</strong>
                                    </td>
                                </tr>
                            @endif

                            @if (!empty($product->city) || !empty($product->location))
                                <tr>
                                    <th><i class="fas fa-map-marker-alt"></i> Location</th>
                                    <td>{{ $product->city }} @if (!empty($product->location))
                                            ({{ $product->location }})
                                        @endif
                                    </td>
                                </tr>
                            @endif
                            @if (!empty($product->condition))
                                <tr>
                                    <th><i class="fas fa-bolt"></i> Condition</th>
                                    <td>{{ $product->condition }}</td>
                                </tr>
                            @endif

                            @if (!empty($product->job_type))
                                <tr>
                                    <th><i class="fas fa-dollar-sign"></i> Job Typw</th>
                                    <td><strong class="text-success">{{ $product->job_type }}</strong>
                                    </td>
                                </tr>
                            @endif
                            @if (!empty($product->jobSubcategory))
                                <tr>
                                    <th><i class="fas fa-dollar-sign"></i> Job SubCategory</th>
                                    <td><strong class="text-success">{{ $product->jobSubcategory }}</strong>
                                    </td>
                                </tr>
                            @endif


                            @if (!empty($product->book_title))
                                <tr>
                                    <th><i class="fas fa-book"></i> Book Title</th>
                                    <td>{{ $product->book_title }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->author))
                                <tr>
                                    <th><i class="fas fa-user"></i> Author</th>
                                    <td>{{ $product->author }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->breed))
                                <tr>
                                    <th><i class="fas fa-paw"></i> Breed</th>
                                    <td>{{ $product->breed }}</td>
                                </tr>
                            @endif
                             @if (!empty($product->processor))
                                <tr>
                                    <th><i class="fas fa-paw"></i> Processor</th>
                                    <td>{{ $product->processor }}</td>
                                </tr>
                            @endif
                             @if (!empty($product->ram))
                                <tr>
                                    <th><i class="fas fa-paw"></i> Ram</th>
                                    <td>{{ $product->ram }}</td>
                                </tr>
                            @endif
                             @if (!empty($product->storage	))
                                <tr>
                                    <th><i class="fas fa-paw"></i> Storage	</th>
                                    <td>{{ $product->storage	 }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->sex))
                                <tr>
                                    <th><i class="fas fa-venus-mars"></i> Sex</th>
                                    <td>{{ $product->sex }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->age))
                                <tr>
                                    <th><i class="fas fa-hourglass-half"></i> Age</th>
                                    <td>{{ $product->age }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->language))
                                <tr>
                                    <th><i class="fas fa-language"></i> Language</th>
                                    <td>{{ $product->language }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->brand))
                                <tr>
                                    <th><i class="fas fa-industry"></i> Brand</th>
                                    <td>{{ $product->brand }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->body_type))
                                <tr>
                                    <th><i class="fas fa-car"></i> Body Type</th>
                                    <td>{{ $product->body_type }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->transmission))
                                <tr>
                                    <th><i class="fas fa-cogs"></i> Transmission</th>
                                    <td>{{ ucfirst($product->transmission) }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->seats))
                                <tr>
                                    <th><i class="fas fa-chair"></i> Seats</th>
                                    <td>{{ $product->seats }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->features))
                                <tr>
                                    <th><i class="fas fa-star"></i> Features</th>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            @foreach (explode(',', $product->features) as $feature)
                                                <li><i class="fas fa-check-circle text-success"></i> {{ trim($feature) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                            @if (!empty($product->color_options))
                                <tr>
                                    <th><i class="fas fa-palette"></i> Colors</th>
                                    <td>{{ $product->color_options }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->fuel_type))
                                <tr>
                                    <th><i class="fas fa-gas-pump"></i> Fuel Type</th>
                                    <td>{{ $product->fuel_type }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->voltage))
                                <tr>
                                    <th><i class="fas fa-bolt"></i> Voltage</th>
                                    <td>{{ $product->voltage }}</td>
                                </tr>
                            @endif
                            @if (!empty($product->wattage))
                                <tr>
                                    <th><i class="fas fa-lightbulb"></i> Wattage</th>
                                    <td>{{ $product->wattage }}</td>
                                </tr>
                            @endif

                            @if (!empty($product->name))
                                <tr>
                                    <th><i class="fas fa-user"></i>Seller Name</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                            @endif

                            @if (!empty($product->phone_number))
                                <tr>
                                    <th><i class="fas fa-phone"></i> Contact</th>
                                    <td>
                                        <span id="phoneNumber" class="d-none">
                                            <a href="tel:{{ $product->phone_number }}"
                                                class="text-primary">{{ $product->phone_number }}</a>
                                        </span>
                                        <button class="btn btn-sm btn-outline-primary py-0 px-2"
                                            onclick="showPhoneNumber()">Show</button>
                                    </td>
                                </tr>
                            @endif

                            <script>
                                function showPhoneNumber() {
                                    let phoneElement = document.getElementById('phoneNumber');
                                    phoneElement.classList.remove('d-none'); // Show the phone number
                                    event.target.style.display = 'none'; // Hide the button after clicking
                                }
                            </script>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            <div class="card shadow-sm border-danger">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-danger">Product Description</h4>
                    <span class="badge bg-success fs-6">🔥 Best Seller</span> <!-- Optional Featured Tag -->
                </div>
                <div class="card-body">
                    @if (!empty($product->description))
                        <p class="text-muted" id="shortDescription">
                            {{ Str::limit($product->description, 200, '...') }}
                            @if (strlen($product->description) > 200)
                                <a href="javascript:void(0);" class="text-primary" onclick="toggleDescription()">Read
                                    More</a>
                            @endif
                        </p>
                        <p class="text-muted d-none" id="fullDescription">{{ $product->description }}</p>

                        <!-- Additional Product Details -->
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item"><strong>Category:</strong> {{ $product->category ?? 'N/A' }}</li>

                            <li class="list-group-item"><strong>Posted On:</strong>
                                {{ $product->created_at->format('F d, Y') }}</li>
                        </ul>
                    @else
                        <p class="text-muted text-center">No description available for this product.</p>
                    @endif
                </div>
            </div>
        </div>

        <script>
            function toggleDescription() {
                document.getElementById('shortDescription').classList.add('d-none');
                document.getElementById('fullDescription').classList.remove('d-none');
            }
        </script>

        <!-- JavaScript for Quantity Buttons -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const quantityInput = document.getElementById("quantity");
                const decreaseBtn = document.querySelector(".quantity-decrease");
                const increaseBtn = document.querySelector(".quantity-increase");

                decreaseBtn.addEventListener("click", function() {
                    let quantity = parseInt(quantityInput.value);
                    if (quantity > 1) {
                        quantityInput.value = quantity - 1;
                    }
                });

                increaseBtn.addEventListener("click", function() {
                    let quantity = parseInt(quantityInput.value);
                    quantityInput.value = quantity + 1;
                });
            });
        </script>
        <script>
            function updateQuantity(change) {
                let qtyInput = document.querySelector('input[name="quantity"]');
                let currentQty = parseInt(qtyInput.value);

                if (isNaN(currentQty) || currentQty < 1) {
                    currentQty = 1;
                }

                let newQty = currentQty + change;

                if (newQty < 1) {
                    newQty = 1;
                }

                qtyInput.value = newQty;
            }
        </script>




        <!-- Rating Section in Blade View (product/show.blade.php) -->
        {{-- <div class="card review-sec shadow-sm mx-auto" style="max-width: 600px; border-radius: 10px; overflow: hidden;">
   <div class="card-header bg-danger text-white d-flex align-items-center justify-content-between p-3 shadow-sm rounded">
    <div class="d-flex align-items-center">
        <i class="fa-regular fa-comment-dots me-2 fs-5"></i>
        <h5 class="mb-0 fw-semibold">Write a Review</h5>
    </div>
</div>

    <div class="card-body p-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h6 class="text-center text-dark mb-3">Leave a Review</h6>

        <!-- Dynamic Rating System -->
        <form method="POST" action="{{ route('ratings.store', $product->id) }}">
            @csrf
            <input type="hidden" name="rating" id="rating-input">
            
            <div class="d-flex justify-content-center mb-3">
                <div id="star-rating" class="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star star" data-value="{{ $i }}"></i>
                    @endfor
                </div>
            </div>

            <div class="form-group mb-3">
                <textarea name="review" id="review-input" placeholder="Write your review..." 
                    class="form-control" style="height: 100px; border-radius: 8px;"></textarea>
            </div>

            <button type="submit" class="btn btn-danger w-100" style="border-radius: 8px;">
                Submit Review
            </button>
        </form>
    </div>
</div>

<!-- Reviews Section -->
<div class="mt-4 mx-auto" style="max-width: 600px;">
    <h6 class="text-center mb-3 text-dark">User Reviews</h6>
    <div id="reviews-list">
        @foreach ($product->ratings as $rating)
            <div class="card mb-3 p-3 shadow-sm" style="border-radius: 8px;">
                <h6 class="mb-1"><strong>{{ $rating->user->name }}</strong></h6>
                <small class="text-muted">{{ $rating->created_at->format('M d, Y') }}</small>
                <div class="star-rating my-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $rating->rating ? 'text-warning' : 'text-muted' }}"></i>
                    @endfor
                </div>
                <p class="mb-0">{{ $rating->review }}</p>
            </div>
        @endforeach
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');
        
        stars.forEach(star => {
            star.addEventListener('click', function() {
                let ratingValue = this.getAttribute('data-value');
                document.getElementById('rating-input').value = ratingValue;

                stars.forEach(s => s.classList.remove('text-warning'));
                for (let i = 0; i < ratingValue; i++) {
                    stars[i].classList.add('text-warning');
                }
            });
        });
    });
</script>
<div class="card question-sec shadow-sm mx-auto" style="max-width: 600px; border-radius: 10px; overflow: hidden;">
    <div class="card-header bg-danger text-white d-flex align-items-center justify-content-between p-3 shadow-sm rounded">
        <div class="d-flex align-items-center">
            <i class="fa-regular fa-question-circle me-2 fs-5"></i>
            <h5 class="mb-0 fw-semibold">Ask a Question</h5>
        </div>
    </div>

    <div class="card-body p-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h6 class="text-center text-dark mb-3">Have a question? Ask here!</h6>

        <form method="POST" action="">
            @csrf
            
            <div class="form-group mb-3">
                <textarea name="question" id="question-input" placeholder="Type your question..." 
                    class="form-control" style="height: 100px; border-radius: 8px;" required></textarea>
            </div>

            <button type="submit" class="btn btn-danger w-100" style="border-radius: 8px;">
                Submit Question
            </button>
        </form>
    </div>
</div> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const stars = document.querySelectorAll('.star');

                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        let ratingValue = this.getAttribute('data-value');
                        document.getElementById('rating-input').value = ratingValue;

                        stars.forEach(s => s.classList.remove('text-warning'));
                        for (let i = 0; i < ratingValue; i++) {
                            stars[i].classList.add('text-warning');
                        }
                    });
                });
            });
        </script>


        @php
            $userId = session('id');

            $hasReviewed = \App\Models\Rating::where('user_id', $userId)->where('product_id', $product->id)->exists();

            $canReview = \App\Models\Order::where('customerId', $userId)
                ->where('status', 'Delivered')

                ->whereHas('orderItems', function ($query) use ($product) {
                    $query->where('productId', $product->id);
                })
                ->exists();
        @endphp

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm border-0" style="border-radius: 10px; background-color: white;">
                        <div
                            class="card-header bg-white text-dark d-flex align-items-center justify-content-between p-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-comment-dots me-2 fs-5 text-primary"></i>
                                <h5 class="mb-0 fw-semibold">Write a Review</h5>
                            </div>
                        </div>
                        <div class="card-body p-4">

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <h6 class="text-center text-dark mb-3">Leave a Review</h6>

                            @if ($canReview && !$hasReviewed)
                                <form id="review-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ session('id') }}">
                                    <input type="hidden" name="rating" id="rating-input">

                                    <!-- Star Rating UI -->
                                    <div class="d-flex justify-content-center mb-3">
                                        <div id="star-rating" class="star-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star star fs-4 mx-1"
                                                    data-value="{{ $i }}"></i>
                                            @endfor
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <textarea name="review" id="review-input" placeholder="Write your review..." class="form-control"
                                            style="height: 80px; border-radius: 8px;"></textarea>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary px-4 py-2"
                                            style="border-radius: 8px;">Submit Review</button>
                                    </div>
                                </form>
                            @elseif($hasReviewed)
                                <p class="text-center text-success">✅ You have already reviewed this product.</p>
                            @else
                                <p class="text-center text-danger">❌ Only customers who have purchased and received this
                                    product can leave a review.</p>
                            @endif

                            <!-- Reviews Section -->
                            <div id="reviews-list" class="mt-4">
                                @foreach ($product->ratings as $review)
                                    <div class="review-item mb-3 p-3 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <strong>{{ $review->user->name }}</strong>
                                            <span class="text-muted">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div>
                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                <span class="text-warning">&#9733;</span>
                                            @endfor
                                            @for ($i = $review->rating; $i < 5; $i++)
                                                <span>&#9734;</span>
                                            @endfor
                                        </div>
                                        <p>{{ $review->review }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const stars = document.querySelectorAll(".star");
                let selectedRating = 0;

                // Star rating click handler
                stars.forEach(star => {
                    star.addEventListener("click", function() {
                        selectedRating = this.getAttribute("data-value");
                        document.getElementById("rating-input").value = selectedRating;

                        // Update UI - Highlight selected stars
                        stars.forEach(s => s.classList.remove("text-warning"));
                        for (let i = 0; i < selectedRating; i++) {
                            stars[i].classList.add("text-warning");
                        }
                    });
                });

                // Handle review form submission via AJAX
                document.getElementById('review-form').addEventListener('submit', function(event) {
                    event.preventDefault();

                    var formData = new FormData(this);

                    fetch("{{ route('ratings.store', $product->id) }}", {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.getElementById('review-form').reset();
                                stars.forEach(star => star.classList.remove('text-warning'));

                                let reviewHtml = `
                        <div class="review-item mb-3 p-3 border rounded">
                            <div class="d-flex justify-content-between">
                                <strong>${data.review.user}</strong>
                                <span class="text-muted">${data.review.created_at}</span>
                            </div>
                            <div>
                                ${'&#9733;'.repeat(data.review.rating)}${'&#9734;'.repeat(5 - data.review.rating)}
                            </div>
                            <p>${data.review.review}</p>
                        </div>
                    `;

                                document.getElementById('reviews-list').innerHTML = reviewHtml + document
                                    .getElementById('reviews-list').innerHTML;
                                alert('Review submitted successfully!');
                            } else {
                                alert(data.message || 'Failed to submit review. Please try again.');
                            }
                        });
                });
            });
        </script>
        {{-- 

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll(".star");
        const ratingInput = document.getElementById("rating-input");
        const reviewForm = document.getElementById("review-form");

        stars.forEach(star => {
            star.addEventListener("click", function () {
                const rating = this.getAttribute("data-value");
                ratingInput.value = rating;

                // Highlight selected stars
                stars.forEach(s => {
                    s.classList.remove("text-warning");
                    if (s.getAttribute("data-value") <= rating) {
                        s.classList.add("text-warning");
                    }
                });
            });
        });

        reviewForm.addEventListener("submit", function (event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch("{{ route('reviews.store', ['productId' => $product->id]) }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Review submitted successfully!");
                    location.reload(); // Reload page to show new review
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error("Error submitting review:", error));
        });
    });
</script> --}}
        <!-- Question Section -->
        <div class="container mt-5">
            <div class="col-md-12">
                <div class="card shadow-sm border-0" style="border-radius: 10px; background-color: white;">
                    <div
                        class="card-header bg-white text-dark d-flex align-items-center justify-content-between p-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-question-circle me-2 fs-5 text-primary"></i>
                            <h5 class="mb-0 fw-semibold">Ask a Question</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div id="success-message"></div>
                        <h6 class="text-center text-dark mb-3">Have a question?</h6>

                        <!-- Question Form -->
                        <form id="question-form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ session('id') }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="form-group mb-3">
                                <textarea name="question" id="question-text" placeholder="Type your question..." class="form-control"
                                    style="height: 80px; border-radius: 8px;" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2"
                                    style="border-radius: 8px;">Submit Question</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Questions & Answers Section -->
                <div class="card mt-4 shadow-sm border-0">
                    <div class="card-header bg-white text-dark p-3 border-bottom">
                        <h5 class="mb-0 fw-semibold">Questions & Answers</h5>
                    </div>
                    <div class="card-body" id="questionsList">
                        @foreach ($product->questions as $question)
                            <div class="question-item mb-3 p-3 border rounded bg-light"
                                id="question_{{ $question->id }}">
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold text-primary mb-1">{{ $question->user->name }} asked:</p>
                                    <span class="text-muted small">{{ $question->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="mb-2">{{ $question->question }}</p>
                                @if ($question->answer)
                                    <p class="fw-bold text-success mb-1">Seller's Answer:</p>
                                    <p class="mb-0">{{ $question->answer }}</p>
                                @else
                                    <p class="text-muted mb-0">No answer yet from the seller.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Set up CSRF token for Laravel AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Handle form submission
                $('#question-form').submit(function(event) {
                    event.preventDefault(); // Prevent normal form submission

                    var formData = $(this).serialize(); // Serialize form data

                    $.ajax({
                        url: "{{ route('question.submit') }}", // Laravel route for question submission
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                // Append new question to the questions list
                                var newQuestion = `
                                    <div class="question-item mb-3 p-3 border rounded bg-light">
                                        <p class="fw-bold text-primary mb-1">${response.user_name} asked:</p>
                                        <p>${response.question}</p>
                                        <p class="text-muted">No answer yet from the seller.</p>
                                    </div>
                                `;
                                $('#questionsList').prepend(newQuestion);

                                // Show success message
                                $('#success-message').html(
                                    '<div class="alert alert-success">Your question has been submitted!</div>'
                                );

                                // Reset the form
                                $('#question-form')[0].reset();
                            } else {
                                $('#success-message').html(
                                    '<div class="alert alert-danger">Failed to submit question. Please try again.</div>'
                                );
                            }
                        },
                        error: function(xhr) {
                            var errorMessage = xhr.status + ': ' + xhr.statusText;
                            $('#success-message').html('<div class="alert alert-danger">Error - ' +
                                errorMessage + '</div>');
                        }
                    });
                });
            });
        </script>

        <style>
            .review-textarea,
            .question-textarea {
                width: 100%;
                height: 100px;
                /* Adjust as needed */
                resize: none;
                /* Prevents resizing */
            }

            .card-header {
                background-color: #C40032;
                /* Red header */
                color: white;
            }

            .btn-danger {
                background-color: #C40032;
                border-color: #C40032;
            }

            textarea {
                font-size: 14px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            textarea:focus {
                border-color: #C40032;
            }

            .product-info {
                padding: 20px;
            }

            .product-title {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .rating {
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .rating i {
                font-size: 18px;
            }

            .price-section {
                margin: 15px 0;
            }

            .price {
                font-size: 22px;
            }

            .quantity-container {
                display: flex;
                align-items: center;
                gap: 10px;
                margin: 15px 0;
            }

            .quantity-container label {
                font-size: 16px;
                font-weight: 600;
            }

            .quantity-container input {
                width: 60px;
                height: 38px;
                text-align: center;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
            }

            .quantity-container button {
                width: 38px;
                height: 38px;
                border-radius: 5px;
                border: 1px solid #ddd;
                background-color: #f8f9fa;
                font-size: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .action-buttons {
                display: flex;
                gap: 15px;
                margin-top: 20px;
            }

            .btn {
                font-size: 16px;
                padding: 10px 20px;
                border-radius: 5px;
            }

            .btn-primary {
                background-color: #C40032;
                border-color: #C40032;
            }

            .btn-outline-danger {
                border-color: #C40032;
                color: #C40032;
            }

            .btn-outline-danger:hover {
                background-color: #C40032;
                color: white;
            }

            .product-image img {
                max-width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .action-buttons .btn-lg {
                font-size: 20px;
                /* Increase text size */
                padding: 15px 40px;
                /* Bigger padding for a larger button */
                border-radius: 8px;
                /* Smooth rounded corners */
                font-weight: bold;
                /* Make the text bold */
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                /* Space between icon and text */
            }

            .action-buttons .btn-primary {
                background-color: #C40032;
                /* Keep it in your theme */
                border-color: #C40032;
            }

            .action-buttons .btn-primary:hover {
                background-color: #C40032;
                border-color: #C40032;
            }

            /* Quantity Buttons */
            .pro-qty {
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .qty-btn {
                background-color: #f8f9fa;
                border: 1px solid #ddd;
                padding: 5px 10px;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
                border-radius: 5px;
            }

            .qty-btn:hover {
                background-color: #e2e6ea;
            }

            input[name="quantity"] {
                width: 50px;
                text-align: center;
                border: 1px solid #ddd;
                padding: 5px;
                font-size: 16px;
                border-radius: 5px;
            }

            /* Add to Cart Button */
            .axil-btn {
                background-color: #C40032;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 18px;
                font-weight: bold;
                border-radius: 5px;
                transition: 0.3s ease-in-out;
            }

            .axil-btn:hover {
                background-color: #C40032;
            }
        </style>
    @endsection

<!DOCTYPE html>
<html lang="en">



<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title', 'ResellZone - Buy & Sell in Pakistan')</title>
    <meta name="description" content="@yield('meta_description', 'ResellZone is Pakistan\'s top platform for buying and selling used products safely.')">
    <meta name="keywords" content="@yield('meta_keywords', 'buy and sell, used products, resell, Pakistan marketplace')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon1.ico') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    @stack('styles')
    @yield('head')
</head>

<body>
    @if (!Request::is('signup') && !Request::is('login'))
        <div class="main-wrapper">
            <header class="header sticky-top shadow-sm bg-white">
                <div class="container">
                    <div id="welcomePopup" class="position-fixed top-0 start-50 translate-middle-x mt-2"
                        style="z-index: 1100; width: auto; max-width: 90%; display: none;">
                        <div class="alert alert-dark d-flex justify-content-between align-items-center shadow-lg border-0 rounded-3 px-4 py-2"
                            role="alert"
                            style="background: linear-gradient(135deg, #1a1a1a, #444); color: #f8f9fa; border-radius: 12px;">
                            <p class="mb-0 small fw-bold" style="font-size: 0.95rem;">
                                🔥 Welcome to <strong>ReSellZonee</strong> – Your One-Stop Shop for Quality & Style!
                                <a href="#" class="text-warning fw-bold text-decoration-none">Shop Now</a>
                            </p>
                            <button id="closePopupBtn" class="btn-close btn-close-white" aria-label="Close"></button>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Check if this is the first visit in this session
                            if (!sessionStorage.getItem("popupShown")) {
                                // Show the popup
                                document.getElementById("welcomePopup").style.display = "block";

                                // Auto-close the popup after 900ms
                                setTimeout(() => {
                                    document.getElementById("welcomePopup").style.display = "none";
                                }, 900);

                                // Mark the popup as shown in this session
                                sessionStorage.setItem("popupShown", "true");
                            }

                            // Close popup when button is clicked
                            document.getElementById("closePopupBtn").onclick = function() {
                                document.getElementById("welcomePopup").style.display = "none";
                            };
                        });
                    </script>


                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            document.querySelector(".close-campaign").addEventListener("click", function() {
                                document.querySelector(".card").style.display = "none";
                            });
                        });
                    </script>

                    <style>
                        .navbar-custom {
                            background-color: white !important;

                            padding: 10px 20px;
                        }

                        .navbar-brand img {
                            height: 50px;
                        }

                        .navbar-nav {
                            margin-left: auto;
                        }

                        .icon-container a {
                            color: white;
                            font-size: 20px;
                            margin-right: 15px;
                        }

                        .btn-sell {
                            background-color: #C40032;
                            color: white;
                            font-weight: bold;
                            border-radius: 50px;
                            padding: 8px 20px;
                        }

                        .dropdown-menu {
                            min-width: 150px;
                        }

                        .dropdown-item i {
                            margin-right: 8px;
                        }
                        
                    </style>

                    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
                        <div class="container-fluid d-flex align-items-center">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/logo_home.png') }}" class="img-fluid" alt="Logo">
                            </a>

                            <div class="d-flex justify-content-center flex-grow-1 bg-white">
                                <form id="searchForm" class="d-flex align-items-center position-relative bg-white"
                                    action="/show-product" method="GET" style="max-width: 600px; width: 100%;">

                                    <select id="categorySelect" name="category"
                                        class="form-select shadow-sm fw-bold bg-white text-dark border-white"
                                        style="padding: 12px 20px; font-size: 16px; border-radius: 10px 0 0 10px; height: 50px;">
                                        <option value="">All Categories</option>
                                        <option value="Vehicles">Vehicles</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="fashion style">Fashion </option>
                                        <option value="health care">Health Care</option>
                                        <option value="job board">Job Board</option>
                                        <option value="mobiles">Mobiles</option>
                                        <option value="property">Property</option>
                                        <option value="services">Services</option>
                                        <option value="kids">Kids</option>
                                        <option value="books & supports">Books & Supports</option>
                                        <option value="pet & animal">Pet & Animal</option>
                                        <option value="furniture">Furniture</option>
                                    </select>

                                    <!-- Search Input -->
                                    <input type="text" id="searchQuery" name="query"
                                        class="form-control shadow-sm bg-white text-dark border-white"
                                        placeholder="Search for products..."
                                        style="padding: 12px 15px; font-size: 16px; height: 50px; border-radius: 0; border: 2px solid white;">

                                    <button type="submit"
                                        class="btn d-flex align-items-center justify-content-center shadow-sm"
                                        style="background-color: #C40032; color: white; height: 50px; border-radius: 0 10px 10px 0; padding: 0 20px; font-size: 18px;">
                                        <img src="https://img.icons8.com/ios-filled/30/FFFFFF/search--v1.png"
                                            alt="Search" class="me-2">
                                        Search
                                    </button>
                                </form>
                            </div>

                            <script>
                                document.getElementById('searchForm').addEventListener('submit', function(event) {
                                    let category = document.getElementById('categorySelect').value;
                                    let query = document.getElementById('searchQuery').value.trim();

                                    if (!category && !query) {
                                        alert("Please select a category or enter a search query.");
                                        event.preventDefault(); // Stop form submission
                                    }
                                });
                            </script>
                            <script>
                                function searchCategory() {
                                    let category = document.getElementById('categorySelect').value;
                                    if (category) {
                                        window.location.href = `/search?category=${category}`;
                                    } else {
                                        alert('Please select a category to search.');
                                    }
                                }
                            </script>
                            @if (session('type') === 'seller' && session()->has('id')) 
                            <div class="d-flex align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-sell me-2 d-flex align-items-center"
                                        href="#">
                                        <i class="fas fa-plus-circle me-1"></i> Sell
                                    </a>
                                    <button type="button" class="btn btn-sell dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        style="max-height: 300px; overflow-y: auto;">
                                        <li><a class="dropdown-item" href="{{ route('categories') }}">All Categories</a>
                                        </li>

                                        @php
                                            $categories = [
                                                'Vehicles',
                                                'Electronics',
                                                'fashion style',
                                                'health care',
                                                'job board',
                                                'mobiles',
                                                'property',
                                                'services',
                                                'kids',
                                                'books & supports',
                                                'pet & animal',
                                                'furniture',
                                            ];
                                        @endphp

                                        @foreach ($categories as $category)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('sellform', ['category' => $category]) }}">
                                                    {{ $category }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

@endif
                            <a href="{{ route('wishlist') }}" title="Wishlist" class="ms-3 me-3">
                                <i class="far fa-heart"></i>
                            </a>

                            <a href="{{ route('cart') }}" title="Cart" class="me-3">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <div class="dropdown">
                              @if (session()->has('id'))
    <a href="#"
        class="dropdown-toggle profile-container d-flex align-items-center"
        id="profileDropdown" data-bs-toggle="dropdown" title="Profile">

        @if (session('profile_picture'))
            <img src="{{ asset('storage/' . session('profile_picture')) }}"
                class="rounded-circle" width="40" height="40" alt="User Profile">
        @endif

        <span class="ms-2">Hi,
            {{ Str::headline(explode(' ', session('name', 'Guest'))[0]) }}</span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        @php
            $showForm = false;
            if (session('type') === 'seller') {
                $seller = \App\Models\SellersRegistration::where('user_id', session('id'))->first();
                if ($seller && $seller->status === 'pending') {
                    $showForm = true;
                }
            }
        @endphp

        @if(session('type') === 'seller' || session('type') === 'admin')
            <li>
                @if($showForm)
                    <a class="dropdown-item" href="#">
                        <i class="far fa-user-circle"></i> Wait For Approval
                    </a>
                @else
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        <i class="far fa-user-circle"></i> Dashboard
                    </a>
                @endif
            </li>
        @endif

        @if(session('type') === 'customer')
            <li>
                <a class="dropdown-item" href="{{ route('profile') }}">
                    <i class="far fa-user-circle"></i> Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('seller.updatepassword') }}">
                    <i class="far fa-user-circle"></i> Reset Password
                </a>
            </li>
             <li>
                <a class="dropdown-item" href="{{ route('my.orders') }}">
                    <i class="far fa-user-circle"></i> My Orders
                </a>
            </li>

            
        @endif

        <li>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>

        @if(session('type') === 'admin')
            <li>
                <a class="dropdown-item text-danger" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-sign-out-alt"></i> Admin
                </a>
            </li>
        @endif
    </ul>

            </li>
                                    </ul>
                                @else
                                    <a href="#" class="dropdown-toggle profile-container" id="profileDropdown"
                                        data-bs-toggle="dropdown" title="Profile">
                                        <i class="far fa-user profile-icon"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">
                                                <i class="fas fa-sign-in-alt"></i> Sign In
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('signup') }}">
                                                <i class="fas fa-user-plus"></i> Sign Up
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                </div>
                </nav>
        </div>
        </div>
        </nav>
        </div>
        </header>
        </div>


    @endif
    {{-- <script>
        function searchCategory() {
            const category = document.getElementById('categorySelect').value;
            if (category) {
                let route = '';
                switch (category) {
                    case 'Vehicles':
                        route = 'http://127.0.0.1:8000/show-product?category=Vehicles';
                        break;
                    case 'electronics':
                        route = 'http://127.0.0.1:8000/show-product?category=Electronics';
                        break;
                    case 'fashion':
                        route = 'http://127.0.0.1:8000/show-product?category=Fashion+Style';
                        break;
                    case 'health':
                        route = 'http://127.0.0.1:8000/show-product?category=Health+Care';
                        break;
                    case 'jobs':
                        route = 'http://127.0.0.1:8000/show-product?category=Job+Board';
                        break;
                    case 'mobiles':
                        route = 'http://127.0.0.1:8000/show-product?category=Mobiles';
                        break;
                    case 'property':
                        route = 'http://127.0.0.1:8000/show-product?category=Property';
                        break;
                    case 'services':
                        route = 'http://127.0.0.1:8000/show-product?category=Services';
                        break;
                    case 'kids':
                        route = 'http://127.0.0.1:8000/show-product?category=Kids';
                        break;
                    case 'books':
                        route = 'http://127.0.0.1:8000/show-product?category=Books+Supports';
                        break;
                    case 'pets':
                        route = 'http://127.0.0.1:8000/show-product?category=Pet+Animal';
                        break;
                    case 'furniture':
                        route = 'http://127.0.0.1:8000/show-product?category=Furniture';
                        break;
                    default:
                        alert('Invalid category!');
                        return;
                }
                window.location.href = route;
            } else {
                alert('Please select a category before searching!');
            }
        }
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            let categories = [
                "Vehicles", "Electronics", "Fashion Style", "Health Care", "Job Board",
                "Mobiles", "Property", "Services", "Kids", "Books & Supports",
                "Pet & Animal", "Furniture"
            ];

            $("#searchInput").on("input", function() {
                let query = $(this).val().toLowerCase();
                let suggestions = categories.filter(item => item.toLowerCase().includes(query));

                if (query.length > 0) {
                    let suggestionHTML = suggestions.map(item => `<li>${item}</li>`).join("");
                    $("#suggestionList").html(suggestionHTML).show();
                } else {
                    $("#suggestionList").hide();
                }
            });

            $(document).on("click", "#suggestionList li", function() {
                $("#searchInput").val($(this).text());
                $("#suggestionList").hide();
            });

            $(document).click(function(e) {
                if (!$(e.target).closest(".search-container").length) {
                    $("#suggestionList").hide();
                }
            });
        });
    </script> --}}

</html>
<style>
    /* Navbar Enhancements */
    .icon-container {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 22px;
    }

    .icon-container a {
        text-decoration: none;
        color: black;
        transition: color 0.3s ease-in-out;
    }

    .icon-container a:hover {
        color: gray;
    }

    /* Profile Dropdown */
    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-menu {
        min-width: 180px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        padding: 10px 15px;
        font-size: 16px;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    /* Adjust Navbar Padding */
    .navbar {
        padding: 15px 20px;
    }

    /* Navbar Enhancements */
    .icon-container {
        display: flex;
        align-items: center;
        gap: 15px;
        font-size: 22px;
    }

    .icon-container a {
        text-decoration: none;
        color: black;
        transition: color 0.3s ease-in-out;
    }

    .icon-container a:hover {
        color: gray;
    }

    /* Adjust Navbar Padding */
    .navbar {
        padding: 15px 20px;
    }

    /* Sell Button Customization */
    .btn-danger {
        background-color: #C40032 border-color:#C40032;
    }

    .btn-danger:hover {
        background-color: #C40032 border-color:#C40032
    }



    .navbar-nav .nav-link {
        transition: all 0.3s ease-in-out;
        position: relative;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #C40032 font-weight: 600;
    }

    .navbar-nav .nav-link::after {
        content: '';
        display: block;
        height: 2px;
        width: 0;
        background: #0d6efd;
        transition: width 0.3s ease-in-out;
        position: absolute;
        bottom: -4px;
        left: 0;
    }

    .navbar-nav .nav-link:hover::after,
    .navbar-nav .nav-link.active::after {
        width: 100%;
    }

    .btn-primary,
    .btn-outline-primary {
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0b5ed7;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }
</style>

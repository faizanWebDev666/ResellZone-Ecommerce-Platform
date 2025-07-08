<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Kanakku provides clean Admin Templates for managing Sales, Payment, Invoice, Accounts and Expenses in HTML, Bootstrap 5, ReactJs, Angular, VueJs and Laravel.">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@dreamstechnologies">
    <meta name="twitter:title" content="Finance & Accounting Admin Website Templates | Kanakku">
    <meta name="twitter:description"
        content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
    <meta name="twitter:image" content="../../backend/img/kanakku.html">
    <meta name="twitter:image:alt" content="Kanakku">
    <meta property="og:title" content="Finance & Accounting Admin Website Templates | Kanakku">
    <meta property="og:description"
        content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
    <meta property="og:image" content="../../backend/img/kanakku.html">
    <meta property="og:image:secure_url" content="../../backend/img/kanakku.html">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <title>@yield('title', 'Default Title')</title>

    <link rel="shortcut icon" href="{{ URL::asset('frontend/img/favicon1.ico')}}">

    <link rel="stylesheet" href="{{ URL::asset('backend/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('backend/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('backend/plugins/feather/feather.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('backend/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('backend/plugins/datatables/datatables.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('backend/css/style.css') }}">


</head>

<body>

    <div class="main-wrapper">

        <div class="header header-one">
            <a href="index.html"
                class="d-inline-flex d-sm-inline-flex align-items-center d-md-inline-flex d-lg-none align-items-center device-logo">
                <img src="{{ URL::asset('backend/img/adminLogo.png') }}" class="img-fluid logo2" alt="Logo">
            </a>
            <div class="main-logo d-inline float-start d-lg-flex align-items-center d-none d-sm-none d-md-none">
                <div class="logo-white">
                    <a href="index.html">
                        <img src="backend/img/logo-full-white.png" class="img-fluid logo-blue" alt="Logo">
                    </a>
                    <a href="index.html">
                        <img src="{{ URL::asset('backend/img/logo-small-white.png') }}" class="img-fluid logo-small"
                            alt="Logo">
                    </a>
                </div>
                <div class="logo-color">
                    <a href="http://127.0.0.1:8000/admin">
                        <img src="{{ URL::asset('backend/img/adminLogo.png') }}" class="img-fluid logo-blue"
                            alt="Logo" style="width: 110px;">
                    </a>

                    <a href="index.html">
                        <img src="{{ URL::asset('backend/img/logo-small.png') }}" class="img-fluid logo-small"
                            alt="Logo">
                    </a>
                </div>
            </div>
            <!-- Sidebar Toggle -->
            <a href="javascript:void(0);" id="toggle_btn">
                <span class="toggle-bars">
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                    <span class="bar-icons"></span>
                </span>
            </a>
            <!-- /Sidebar Toggle -->

            <!-- Search -->
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><img src="{{ URL::asset('backend/img/icons/search.svg') }}"
                            alt="img"></button>
                </form>
            </div>
            <!-- /Search -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Menu -->
            <ul class="nav nav-tabs user-menu">
                <!-- Flag -->

                <li class="nav-item dropdown flag-nav dropdown-heads">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">
                        <i class="fe fe-bell"></i> <span class="badge rounded-pill" id="contact-count">0</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <div class="notification-title">
                                Notifications
                                <a href="javascript:void(0)" onclick="viewAllNotifications()">View all</a>
                            </div>
                            {{--  <a href="javascript:void(0)" class="clear-noti d-flex align-items-center" onclick="markAllAsRead()">Mark all as read <i class="fe fe-check-circle"></i></a>  --}}
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list" id="contact-list"></ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="javascript:void(0)" onclick="clearAllNotifications()">Clear All</a>
                        </div>
                    </div>
                </li>

                <script>
                    function fetchUnreadContacts() {
                        let lastClearedTime = localStorage.getItem("lastClearedTime") || 0;

                        fetch('/contacts/unread')
                            .then(response => response.json())
                            .then(data => {
                                let contactList = document.getElementById('contact-list');
                                let contactCount = document.getElementById('contact-count');

                                let newContacts = data.filter(contact => new Date(contact.created_at).getTime() > lastClearedTime);

                                contactList.innerHTML = '';
                                contactCount.innerText = newContacts.length;

                                newContacts.forEach(contact => {
                                    let listItem = `
                                        <li class="notification-message">
                                            <a href="profile.html">
                                                <div class="d-flex">
                                                    {{--  <span class="avatar avatar-md active">
                                                        <img class="avatar-img rounded-circle" src="{{ URL::asset('backend/img/profiles/avatar-02.jpg')}}" alt="avatar">
                                                    </span>  --}}
                                                    <div class="media-body">
                                                        <p class="noti-details"><span class="noti-title">${contact.name}</span> sent a message: <span class="noti-title">${contact.subject}</span></p>
                                                        <p class="noti-time"><span class="notification-time">${new Date(contact.created_at).toLocaleString()}</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    `;
                                    contactList.innerHTML += listItem;
                                });
                            });
                    }

                    function markAllAsRead() {
                        document.querySelectorAll('.notification-message').forEach(item => {
                            item.classList.add('read'); // Optional: Add a "read" class if needed
                        });
                        document.getElementById('contact-count').innerText = '0';
                    }

                    function clearAllNotifications() {
                        document.getElementById('contact-list').innerHTML = ''; // Remove all notifications from UI
                        document.getElementById('contact-count').innerText = '0';

                        // Save the current timestamp to prevent old notifications from reappearing
                        localStorage.setItem("lastClearedTime", Date.now());
                    }

                    function viewAllNotifications() {
                        window.location.href = "http://127.0.0.1:8000/adminContacts";
                    }

                    fetchUnreadContacts(); // Initial fetch
                </script>

                <li class="nav-item  has-arrow dropdown-heads ">
                    <a href="javascript:void(0);" class="win-maximize">
                        <i class="fe fe-maximize"></i>
                    </a>
                </li>


                <!-- User Menu -->
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="user-link  nav-link" data-bs-toggle="dropdown">
                        @if (session('profile_picture'))
                            <img src="{{ asset('storage/' . (session('admin_profile') ?? 'frontend/img/default-avatar.jpg')) }}"
                                class="rounded-circle" width="40" height="40" alt="User Profile">
                        @endif
                        {{-- <span class="user-img">
                            <img src="backend/img/profiles/avatar-07.jpg" alt="img" class="profilesidebar">
                            <span class="animate-circle"></span>
                        </span> --}}
                          <span class="ms-2">Hi,
            {{ Str::headline(explode(' ', session('name', 'Guest'))[0]) }}</span>
    </a>

                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilemenu">
                            <div class="subscription-menu">
                                <ul>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('adminprofile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="settings.html">Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="subscription-logout">
                                <ul>
                                    <li class="pb-0">
                                        <a class="dropdown-item" href="{{ url::to('logout') }}">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>

            <!-- /Header Menu -->

        </div>

        <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="sidebar-vertical">

                <!-- Admin Dashboard -->
                <li class="menu-title"><span>Dashboard</span></li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-home"></i> <span>Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ URL::to('admin') }}">Admin Dashboard</a></li>
                        <li><a href="{{ URL::to('/') }}">Visit Client Site</a></li>
                    </ul>
                </li>
 <!-- User & Sellers -->
                <li class="menu-title"><span>User Management</span></li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-user-check"></i> <span>Sellers Management</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.register') }}">Seller Applications</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span>Users Management</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('Customers') }}">All Users</a></li>
                    </ul>
                </li>
                  <!-- Sales & Payments -->
                <li class="menu-title"><span>Finance</span></li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-bar-chart-2"></i> <span>Total Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.Totalsales') }}">Sales Overview</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-credit-card"></i> <span>Payments</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.payments') }}">All Payments</a></li>
                    </ul>
                </li>
                <!-- CMS & Content -->
                <li class="menu-title"><span>Content Management</span></li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-edit"></i> <span>Blog Management</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('admin.blog.create') }}">Manage Blogs</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-lock"></i> <span>Policy Management</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('privacy.edit') }}">Edit Policy</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-mail"></i> <span>Newsletters</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('getNewsletters') }}">Manage Subscribers</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-message-circle"></i> <span>Contact Messages</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('getContacts') }}">User Messages</a></li>
                    </ul>
                </li>

               

                <!-- Product & Orders -->
                <li class="menu-title"><span>Shop Management</span></li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-package"></i> <span>Products</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ URL::to('adminproducts') }}">Product List</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-shopping-cart"></i> <span>Orders</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ URL::to('adminOrders') }}">Manage Orders</a></li>
                    </ul>
                </li>

              

            </ul>
        </div>
    </div>
</div>
<script>
            $(document).ready(function() {
                $('.slimscroll').slimScroll({
                    height: 'auto', 
                    size: '5px',
                    color: '#000', 
                    alwaysVisible: false, 
                    railVisible: true, 
                    railColor: '#333',
                    railOpacity: 0.3,
                    wheelStep: 10
                });
            });
        </script>
<style>
  .menu-title {
    padding: 12px 20px;
    margin: 20px 0 10px;
    font-size: 13px;
    font-weight: 700;
    color: #9aa0ac; /* soft muted tone */
    text-transform: uppercase;
    letter-spacing: 0.8px;
    position: relative;
}

.menu-title::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 20px;
    width: 80%;
    height: 1px;
    background-color: #e0e3e9;
    opacity: 0.4;
}


</style>
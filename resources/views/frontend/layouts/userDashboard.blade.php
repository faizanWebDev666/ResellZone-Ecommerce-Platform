
<div class="dashboard-content listing-section ">
    <div class="container">
    <div class>
    <ul class="dashborad-menus">
    <li>
    <a href="{{URL::to('dashboard')}}">
    <i class="feather-grid"></i> <span>Dashboard</span>
    </a>
    </li>
    <li>
    <a href="{{URL::to('profile')}}">
    <i class="fa-solid fa-user"></i> <span>Profile</span>
    </a>
    </li>
    <li class="active">
    <a href="{{URL::to('mylisting')}}">
    <i class="feather-list"></i> <span>My Listing</span>
    </a>
    </li>
    <li>
    <a href="{{URL::to('orders')}}">
    <i class="fas fa-solid fa-heart"></i> <span>My orders</span>
    </a>
    </li>
    
    <li>
    <a href="{{route('questions')}}">
    <i class="fa-solid fa-comment-dots"></i> <span>Questions</span>
    </a>
    </li>

    <li>
        <a href="{{URL::to('reviews')}}">
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
    <div class="dash-listingcontent dashboard-info">
    <div class="dash-cards card">
    <div class="card-header">
    <h4>My Listings</h4>
    <a class="nav-link add-listing" href="{{URL::to('categories')}}"><span><i class="fa-solid fa-plus"></i></span>Add Listing</a>
    </div>
    <div class="card-body">
    <div class="listing-search">
    <div class="filter-content form-set">
    <div class="group-img">
    <input type="text" class="form-control" placeholder="Search...">
    <i class="feather-search"></i>
    </div>
    </div>
    <div class="sorting-div">
    <div class="sortbyset">
    <span class="sortbytitle">Sort by</span>
    <div class="sorting-select">
    <select class="form-control select">
    <option>Newest</option>
    <option>Newest</option>
    <option>Oldest</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    
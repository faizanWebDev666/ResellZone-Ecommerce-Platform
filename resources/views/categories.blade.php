@extends('frontend.layouts.main')
@section('title', 'Browse Categories | ResellZone')

@section('main-container')
    <section class="category-section">
        <div class="container">
            <div class="section-heading">
                <div class="row align-items-center">
                    <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                        <h2>Sell <span class="title-left">Fre</span>ely</h2>
                        <p>Please select a category below and then proceed to post your ad</p>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'Vehicles']) }} class="category-links">
                        <h5>Vehicles</h5>
                        <img src="frontend/img/icons/index/vehicles.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'Electronics']) }} class="category-links">
                        <h5>Electronics</h5>

                        <img src="frontend/img/icons/index/electronics.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'fashion style']) }} class="category-links">
                        <h5>Fashion Style</h5>

                        <img src="frontend/img/icons/index/fashion.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'health care']) }} class="category-links">
                        <h5>Health Care</h5>

                        <img src="frontend/img/icons/index/health.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'job board']) }} class="category-links">
                        <h5>Job Board</h5>
                        <img src="frontend/img/icons/index/job.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'mobiles']) }} class="category-links">
                        <h5>Mobiles</h5>
                        <img src="frontend/img/icons/index/mobiles.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'property']) }} class="category-links">
                        <h5>property</h5>

                        <img src="frontend/img/icons/index/estates.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'services']) }} class="category-links">
                        <h5>Services</h5>


                        <img src="frontend/img/icons/index/travels.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'kids']) }} class="category-links">
                        <h5>Kids</h5>

                        <img src="frontend/img/icons/index/sports.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'books & supports']) }} class="category-links">
                        <h5>Books & Supports </h5>


                        <img src="frontend/img/icons/index/magznes.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'pet & animal']) }} class="category-links">
                        <h5>Pet & Animal</h5>


                        <img src="frontend/img/icons/index/pets.png" alt="icons">
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <a href={{ route('sellform', ['category' => 'furniture']) }} class="category-links">
                        <h5>Furniture</h5>


                        <img src="frontend/img/icons/index/furniture.png" alt="icons">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

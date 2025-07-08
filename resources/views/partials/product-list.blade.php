@extends('frontend.layouts.main')
@section('main-container')
</head>

<body>
    <div class="image-slider"
        style="position: relative; overflow: hidden; height: 60vh; width: 100vw; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); margin-bottom: 30px;">
        <div class="slider-wrapper" style="display: flex; transition: transform 1s ease-in-out;">
            <img src="{{ asset('frontend/img/slider/image3.jpg') }}" class="slide"
                style="flex-shrink: 0; width: 100vw; height: 60vh; object-fit: cover;">
            <img src="{{ asset('frontend/img/slider/image2.jpg') }}" class="slide"
                style="flex-shrink: 0; width: 100vw; height: 60vh; object-fit: cover;">
            <img src="{{ asset('frontend/img/slider/image1.jpg') }}" class="slide"
                style="flex-shrink: 0; width: 100vw; height: 60vh; object-fit: cover;">
            <img src="{{ asset('frontend/img/slider/image4.jpg') }}" class="slide"
                style="flex-shrink: 0; width: 100vw; height: 60vh; object-fit: cover;">
            <img src="{{ asset('frontend/img/slider/image67.jpg') }}" class="slide"
                style="flex-shrink: 0; width: 100vw; height: 60vh; object-fit: cover;">
        </div>

        <div class="prev-arrow" onclick="showPreviousSlide()"
            style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%); font-size: 28px; color: white; cursor: pointer; padding: 10px; border-radius: 50%;"
            onmouseover="this.style.background='rgba(255, 255, 255, 0.1)'; this.style.color='white';"
            onmouseout="this.style.background='none'; this.style.color='white';">
            &#x2190;
        </div>
        <div class="next-arrow" onclick="showNextSlide()"
            style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); font-size: 28px; color: white; cursor: pointer; padding: 10px; border-radius: 50%;"
            onmouseover="this.style.background='rgba(255, 255, 255, 0.1)'; this.style.color='white';"
            onmouseout="this.style.background='none'; this.style.color='white';">
            &#x2192;
        </div>
    </div>


    <script>
        const sliderWrapper = document.querySelector('.slider-wrapper');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;

        // Clone first and last slides for seamless looping
        sliderWrapper.appendChild(slides[0].cloneNode(true));
        sliderWrapper.insertBefore(slides[totalSlides - 1].cloneNode(true), slides[0]);

        let currentSlideIndex = 1; // Start at the first real slide
        sliderWrapper.style.transform = `translateX(-100vw)`; // Offset for the first real slide
        let isTransitioning = false;

        // Show the next slide
        function showNextSlide() {
            if (isTransitioning) return;
            isTransitioning = true;

            currentSlideIndex++;
            sliderWrapper.style.transition = 'transform 1s ease-in-out';
            sliderWrapper.style.transform = `translateX(-${currentSlideIndex * 100}vw)`;

            sliderWrapper.addEventListener('transitionend', () => {
                if (currentSlideIndex === totalSlides + 1) {
                    sliderWrapper.style.transition = 'none'; // Instantly reset
                    currentSlideIndex = 1; // Reset to first real slide
                    sliderWrapper.style.transform = `translateX(-${currentSlideIndex * 100}vw)`;
                }
                isTransitioning = false;
            }, {
                once: true
            });
        }

        // Show the previous slide
        function showPreviousSlide() {
            if (isTransitioning) return;
            isTransitioning = true;

            currentSlideIndex--;
            sliderWrapper.style.transition = 'transform 1s ease-in-out';
            sliderWrapper.style.transform = `translateX(-${currentSlideIndex * 100}vw)`;

            sliderWrapper.addEventListener('transitionend', () => {
                if (currentSlideIndex === 0) {
                    sliderWrapper.style.transition = 'none'; // Instantly reset
                    currentSlideIndex = totalSlides; // Reset to last real slide
                    sliderWrapper.style.transform = `translateX(-${currentSlideIndex * 100}vw)`;
                }
                isTransitioning = false;
            }, {
                once: true
            });
        }

        // Auto-slide every 5 seconds
        setInterval(showNextSlide, 2000);
    </script>


    <div class="container category-section" style="margin-top: 30px;">
        <div class="section-heading">
            <div class="row align-items-center">
                <div class="col-md-6 ">
                    <h2>Buy <span class="title-left">Fre</span>ely</h2>
                    <p>Buy Everything from Used Our Top Category</p>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'Vehicles']) }}" class="category-links">
                    <h5>Vehicles</h5>

                    <img src="frontend/img/icons/index/vehicles.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'Electronics']) }}" class="category-links">
                    <h5>Electronics</h5>

                    <img src="frontend/img/icons/index/electronics.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'fashion style']) }}" class="category-links">
                    <h5>Fashion Style</h5>
                    <img src="frontend/img/icons/index/fashion.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'health care']) }}" class="category-links">
                    <h5>Health Care</h5>

                    <img src="frontend/img/icons/index/health.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'job board']) }}" class="category-links">
                    <h5>Job Board</h5>

                    <img src="frontend/img/icons/index/job.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'books & supports']) }}" class="category-links">
                    <h5>Mobiles</h5>

                    <img src="frontend/img/icons/index/mobiles.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'property']) }}" class="category-links">
                    <h5>Real Estate</h5>

                    <img src="frontend/img/icons/index/estates.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ URL::to('show-product') }}" class="category-links">
                    <h5>Travel</h5>

                    <img src="frontend/img/icons/index/travels.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ URL::to('show-product') }}" class="category-links">
                    <h5>Sports & Game</h5>

                    <img src="frontend/img/icons/index/sports.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ URL::to('show-product') }}" class="category-links">
                    <h5>Magazines</h5>

                    <img src="frontend/img/icons/index/magznes.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ URL::to('show-product') }}" class="category-links">
                    <h5>Pet & Animal</h5>

                    <img src="frontend/img/icons/index/pets.png" alt="icons">
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <a href="{{ route('show-product', ['category' => 'furniture']) }}" class="category-links">
                    <h5>Furniture</h5>

                    <img src="frontend/img/icons/index/furniture.png" alt="icons">
                </a>
            </div>
        </div>
    </div>

    <section>
        <div class="section-heading">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 aos aos-init aos-animate" data-aos="fade-up">
                        <h2>Lat<span class="title-right">est</span> Products</h2>
                        <p>People are giving these goods for free, so check them out.</p>
                    </div>
                    <div class="col-md-6 text-md-end aos aos-init aos-animate" data-aos="fade-up">
                        <a href="{{ url('/about') }}" class="btn btn-view">View All</a>
                    </div>
                </div>
            </div>
        </div>
<div class="row g-3">
    @foreach ($product as $pro)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-sm h-100"
                style="border-radius: 12px; overflow: hidden; cursor: pointer; transition: all 0.3s ease-in-out;"
                onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0px 10px 20px rgba(0,0,0,0.2)';"
                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0px 4px 8px rgba(0,0,0,0.1)';">

                <a href="{{ route('product-details', ['id' => $pro->id]) }}" class="text-decoration-none text-dark">
                    <div class="position-relative">
                        <img src="{{ $pro->productImages->first()->product_images ?? asset('images/default.jpg') }}"
                            class="card-img-top"
                            alt="Product Image"
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
                            $adjustedPrice = ($pro->price ?? 0) > 200 ? $pro->price - 200 : $pro->price ?? 0;
                        @endphp
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="fw-bold text-danger me-2 fs-5">
                                ${{ number_format($adjustedPrice, 2) }}
                            </span>
                            <small class="text-muted"><del>${{ number_format($pro->price ?? 0, 2) }}</del></small>
                        </div>

                        <div class="text-warning mt-1">
                            ⭐ 4.0 (50 Reviews)
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="d-flex justify-content-center mt-4">
    <nav>
        {!! $product->links('pagination::bootstrap-5') !!}
    </nav>
</div>
@endsection
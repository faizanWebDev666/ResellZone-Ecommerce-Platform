@extends('frontend.layouts.main')
@section('main-container')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="img/gallery/gallery1/gallery-1.jpg" data-fancybox="gallery1">
                    <img class="d-block w-100" src="img/gallery/gallery1/gallery-1.jpg" alt="First slide">
                </a>
            </div>
            <div class="carousel-item">
                <a href="img/gallery/gallery1/gallery-2.jpg" data-fancybox="gallery1">
                    <img class="d-block w-100" src="img/gallery/gallery1/gallery-2.jpg" alt="Second slide">
                </a>
            </div>
            <div class="carousel-item">
                <a href="img/gallery/gallery1/gallery-3.jpg" data-fancybox="gallery1">
                    <img class="d-block w-100" src="img/gallery/gallery1/gallery-3.jpg" alt="Third slide">
                </a>
            </div>
            <div class="carousel-item">
                <a href="img/gallery/gallery1/gallery-4.jpg" data-fancybox="gallery1">
                    <img class="d-block w-100" src="img/gallery/gallery1/gallery-4.jpg" alt="Fourth slide">
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Custom CSS for Image Size -->
    <style>
        .carousel-inner img {
            max-width: 100%;
            /* Ensures the image doesn't overflow the container */
            height: auto;
            /* Maintains aspect ratio */
        }

        .carousel {
            max-width: 800px;
            /* Set your desired maximum width */
            margin: auto;
            /* Center the carousel */
        }
    </style>

    <!-- jQuery and Bootstrap JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <section class="details-description">
        <div class="container">
            <div class="about-details">
                <div class="about-headings">
                    <div class="authordetails">
                        <h5>Sleep In a Room in Apartment</h5>
                        <p>Luxury hotel in the heart of Blommsbury</p>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fa-regular fa-star rating-color"></i>
                            <span class="d-inline-block average-rating"> 4.5 </span>
                        </div>
                    </div>
                </div>
                <div class="rate-details">
                    <h2>$350</h2>
                    <p>Fixed</p>
                </div>
            </div>
            <div class="descriptionlinks">
                <div class="row">
                    <div class="col-lg-9">
                        <ul>
                            <li><a href="javascript:void(0);"><i class="feather-map"></i> Get Directions</a></li>
                            <li><a href="javascript:void(0);"><img src="img/website.svg" alt="website">Website</a></li>
                            <li><a href="javascript:void(0);"><i class="feather-share-2"></i> share</a></li>
                            <li><a href="javascript:void(0);"><i class="fa-regular fa-comment-dots"></i> Write a review</a>
                            </li>
                            <li><a href="javascript:void(0);"><i class="feather-flag"></i> report</a></li>
                            <li><a href="javascript:void(0);"><i class="feather-heart"></i> Save</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <div class="callnow">
                            <a href="contact.html"> <i class="feather-phone-call"></i> Call Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="details-main-wrapper listing-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card ">
                        <div class="card-header">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                    <div class="col-lg-12 theiaStickySidebar">
                        <div class="rightsidebar">
                            <div class="card">
                                <h4><img src="img/details-icon.svg" alt="details-icon"> Details</h4>
                                <ul>
                                    <li>Contract <span>For Rent</span></li>
                                    <li>Location <span>New York, USA</span></li>
                                    <li>Year Built <span>1988</span></li>
                                    <li>Rooms <span>3</span></li>
                                    <li>Beds <span>4</span></li>
                                    <li>Baths <span>8</span></li>
                                    <li>Gadgets <span>6</span></li>
                                    <li>Home Area <span>30 sqft</span></li>
                                    <li>Lot Dimensions <span>30*30*20 ft</span></li>
                                    <li class="p-0">Lot Area <span>50 ft</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @endsection

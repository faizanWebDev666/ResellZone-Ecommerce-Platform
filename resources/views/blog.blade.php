@extends('frontend.layouts.main')
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
                            Read Our Blogs
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
                                    <span style="color: white;">> Blog</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bloglisting listing-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8"style="margin-left:173px">
                    <div class="bloglistleft-widget blog-listview" sty>
                        <div class="card-container">
                            <div class="card">
                                <div class="blog-widget">
                                    <div class="blog-img">
                                        <a href="{{ URL::to('blog_details') }}">
                                            <img src="frontend/img/blog/bloglistview-2.jpg" class="img-fluid"
                                                alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="bloglist-content" style="width:53%">
                                        <div class="card-body">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <div class="post-author-img">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> November 1,
                                                    2024</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="{{ URL::to('blog_details') }}">Top 5 Tips to
                                                    Sell Products Quickly on ResellZone</a></h3>
                                            <p class="mb-0">Discover expert tips for reselling products successfully on
                                                ResellZone, from setting the right price to optimizing your listings.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="blog-widget">
                                    <div class="blog-img">
                                        <a href="{{ URL::to('blog_details') }}">
                                            <img src="frontend/img/blog/bloglistview-2.jpg" class="img-fluid"
                                                alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="bloglist-content"style="width:53%">
                                        <div class="card-body">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <div class="post-author-img">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> November 2,
                                                    2024</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="{{ URL::to('blog_details') }}">Latest Trends in
                                                    Second-Hand Electronics</a></h3>
                                            <p class="mb-0">Learn about the latest trends in second-hand electronics and
                                                how you can take advantage of them on ResellZone.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="blog-widget">
                                    <div class="blog-img">
                                        <a href="{{ URL::to('blog_details') }}">
                                            <img src="frontend/img/blog/bloglistview-3.jpg" class="img-fluid"
                                                alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="bloglist-content"style="width:53%">
                                        <div class="card-body">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <div class="post-author-img">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> November 3,
                                                    2024</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="{{ URL::to('blog_details') }}">A Beginners Guide
                                                    to Reselling Furniture on ResellZone</a></h3>
                                            <p class="mb-0">Step-by-step guide for beginners looking to sell furniture
                                                effectively on ResellZone and reach more customers.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="blog-widget">
                                    <div class="blog-img">
                                        <a href="{{ URL::to('blog_details') }}">
                                            <img src="frontend/img/blog/bloglistview-4.jpg" class="img-fluid"
                                                alt="blog-img">
                                        </a>
                                    </div>
                                    <div class="bloglist-content"style="width:53%">
                                        <div class="card-body">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <div class="post-author-img">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> November 4,
                                                    2024</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="{{ URL::to('blog_details') }}">Best Smartphones
                                                    to Resell on ResellZone in 2024</a></h3>
                                            <p class="mb-0">Looking for the best smartphones to buy and resell in 2024?
                                                Check out our review on the top smartphones that are in high demand.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Space between the cards */
            justify-content: center;
            /* Center-align cards within the container */
            padding: 20px;
        }

        .card {
            flex: 1 1 calc(45% - 20px);
            /* Cards take 45% of container width, responsive */
            max-width: 500px;
            /* Prevent cards from growing too large */
            min-width: 300px;
            /* Prevent cards from shrinking too much */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Shadow for depth */
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card .blog-widget {
            padding: 15px;
        }

        .card .blog-img img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
        }

        .card .card-body {
            padding: 15px;
        }

        .card .card-body h3 {
            font-size: 18px;
            font-weight: 600;
            margin: 10px 0;
        }

        .card .card-body p {
            font-size: 14px;
            color: #555;
        }

        .entry-meta {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 12px;
            color: #777;
        }
    </style>
@endsection

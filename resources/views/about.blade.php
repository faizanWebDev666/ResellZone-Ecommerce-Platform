@extends('frontend.layouts.main')

@section('title', 'About | ResellZone')

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
                            About Us
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
                                    <span style="color: white;">> About</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="about-content">
        <div class="container">
            <div class="about-listee">
                <div class="about-img">
                    <img src="frontend/img/about.jpg" class="img-fluid" alt>
                </div>
                <div class="about-info">
                    <h4> <span>About</span> ResellZone</h4>
                    <p>Welcome to ResellZone, your premier online marketplace for buying and selling gently used goods. Our
                        platform connects individuals looking to declutter their lives with those seeking great deals on
                        second-hand items. With a focus on sustainability and community, ResellZone makes it easy to turn
                        unwanted items into cash and find unique treasures.

                    </p>
                    <p>Our mission is to provide a safe, reliable, and user-friendly platform for individuals to resell
                        their unwanted goods, promoting a culture of reuse and recycling. Join our community today and start
                        buying, selling, and saving </p>
                </div>
            </div>
        </div>
    </section>

    <section class="howitworks">
        <div class="container">
            <h3 class="section-title">How Its Work</h3>
            <div class="steps-grid">
                <div class="step-block">
                    <h4>For Sellers:</h4>
                    <ol class="step-list">
                        <li><strong>Create an Account:</strong> Sign up for free and join the ResellZone community.</li>
                        <li><strong>Post Your Ad:</strong> Capture a high-quality photo of the item, write a detailed
                            description, and set a competitive price.</li>
                        <li><strong>Choose a Category:</strong> Select the most appropriate category for your item to
                            connect with the right buyers.</li>
                        <li><strong>Publish and Share:</strong> Publish your ad and promote it on social media to increase
                            visibility.</li>
                        <li><strong>Connect with Buyers:</strong> Respond to messages from interested buyers and negotiate
                            terms.</li>
                        <li><strong>Meet and Sell:</strong> Arrange a meeting with the buyer to complete the transaction.
                        </li>
                    </ol>
                </div>
                <div class="step-block">
                    <h4>For Buyers:</h4>
                    <ol class="step-list">
                        <li><strong>Search for Items:</strong> Explore categories or use the search feature to find specific
                            items.</li>
                        <li><strong>Contact the Seller:</strong> Reach out to the seller to ask questions or make an offer
                        </li>
                        <li><strong>Negotiate and Meet:</strong> Discuss terms with the seller and arrange a meeting to
                            finalize the transaction.</li>
                        <li><strong>Make a Purchase:</strong> Inspect the item in person, pay the seller, and enjoy your new
                            purchase.</li>
                    </ol>
                </div>
            </div>

        </div>
    </section>

    <style>
        .step-block-container {
            display: flex;
            justify-content: space-between;
            /* Ensures there's space between the blocks */
            gap: 20px;
            /* Adds space between the blocks */
        }

        .step-block {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            width: 45%;
            /* Ensure both blocks take up 45% width */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .steps-grid {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            /* Adds space between the two blocks */
        }

        .step-block {
            width: 48%;
            /* Ensures both blocks fit in the row */
        }

        .step-list {
            list-style-type: none;
            /* Removes bullet points */
            padding-left: 0;
        }

        .step-list li {
            margin-bottom: 10px;
            /* Adds space between list items */
        }


        .step-block:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: #ff9900;
        }

        h4 {
            font-size: 22px;
            color: #555;
            margin-bottom: 15px;
            text-align: center;
        }

        .step-list {
            list-style: none;
            padding-left: 0;
        }

        .step-list li {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.5;
            color: #666;
        }

        strong {
            color: #333;
            font-weight: 600;
        }

        ol {
            counter-reset: steps;
        }

        ol li {
            counter-increment: steps;
            position: relative;
            padding-left: 25px;
        }

        @media (max-width: 768px) {
            .steps-grid {
                flex-direction: column;
            }

            .step-block {
                width: 100%;
            }
        }
    </style>
    <div class="row howitworks">
        <div class="col-lg-4 col-md-4 d-flex">
            <div class="howitwork-info">
                <h5 class="step-number">01</h5>
                <h6 class="step-title">Create Account</h6>
                <p class="step-description">Sign up for free and join the ResellZone community. Enjoy immediate access to a
                    vibrant marketplace where you can buy, sell, and connect with like-minded individuals. Discover unique
                    items and turn your unwanted goods into cash. The possibilities are endless!</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex">
            <div class="howitwork-info">
                <h5 class="step-number">02</h5>
                <h6 class="step-title">Post An Ad</h6>
                <p class="step-description">Take a clear photo, add a detailed description, and set a fair price. Select the
                    most relevant category to ensure your item reaches the right audience. A well-presented ad can help you
                    attract more buyers.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 d-flex">
            <div class="howitwork-info">
                <h5 class="step-number">03</h5>
                <h6 class="step-title">Find, Buy & Own Dreams</h6>
                <p class="step-description">Connect with buyers through ResellZone’s secure messaging. Arrange a safe
                    meeting to complete the transaction in person and make sure both parties are satisfied.</p>
            </div>
        </div>
    </div>

    <style>
        .howitworks {
            padding: 40px 0;
            background-color: #f9f9f9;
        }

        .howitwork-info {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .howitwork-info:hover {
            transform: translateY(-10px);
        }

        .step-number {
            font-size: 36px;
            color: #ff6600;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .step-title {
            font-size: 20px;
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .step-description {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .howitwork-info {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection

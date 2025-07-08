@extends('frontend.layouts.main')
@section('title', 'Frequent Asked Questions')
@section('main-container')
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Frequently Asked Questions</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="faq-section listing-section">
        <div class="container">
            <div class="faq-info">
              

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqOne')" aria-expanded="false">
                            <span class="plus-icon">+</span> How do I list an item for sale?
                        </a>
                    </h4>
                    <div id="faqOne" class="card-collapse collapse">
                        <p>To list an item for sale, simply log in to your account, navigate to the 'Post an Ad' section,
                            fill in the details about your item (e.g., title, description, category, price), and upload
                            images. Once you're done, click 'Publish'.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqTwo')" aria-expanded="false">
                            <span class="plus-icon">+</span> How can I delete my listing?
                        </a>
                    </h4>
                    <div id="faqTwo" class="card-collapse collapse">
                        <p>To delete your listing, go to the 'My Ads' section in your account. Select the listing you wish
                            to remove, and click 'Delete'. Please note that once deleted, the listing cannot be recovered.
                        </p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqThree')" aria-expanded="false">
                            <span class="plus-icon">+</span> How do I contact a seller?
                        </a>
                    </h4>
                    <div id="faqThree" class="card-collapse collapse">
                        <p>To contact a seller, click on the 'Contact Seller' button on their listing page. You will be able
                            to send a message directly to them through our platform's messaging system.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqFour')" aria-expanded="false">
                            <span class="plus-icon">+</span> How can I update my profile information?
                        </a>
                    </h4>
                    <div id="faqFour" class="card-collapse collapse">
                        <p>To update your profile information, go to 'My Account' and click on 'Edit Profile'. From there,
                            you can update your name, email, phone number, and profile picture.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqFive')" aria-expanded="false">
                            <span class="plus-icon">+</span> How can I mark an item as sold?
                        </a>
                    </h4>
                    <div id="faqFive" class="card-collapse collapse">
                        <p>To mark an item as sold, go to 'My Ads', select the item you sold, and click the 'Mark as Sold'
                            button. This will update the status of your listing.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqSix')" aria-expanded="false">
                            <span class="plus-icon">+</span> Why was my listing rejected?
                        </a>
                    </h4>
                    <div id="faqSix" class="card-collapse collapse">
                        <p>Your listing may be rejected if it violates our terms and conditions, contains prohibited items,
                            or lacks important details. Ensure your listing complies with our guidelines before reposting
                            it.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqSeven')" aria-expanded="false">
                            <span class="plus-icon">+</span> How can I change my password?
                        </a>
                    </h4>
                    <div id="faqSeven" class="card-collapse collapse">
                        <p>To change your password, go to 'My Account' and click on 'Change Password'. Enter your current
                            password, followed by your new password, and click 'Save'.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqEight')" aria-expanded="false">
                            <span class="plus-icon">+</span> How can I deactivate my account?
                        </a>
                    </h4>
                    <div id="faqEight" class="card-collapse collapse">
                        <p>To deactivate your account, go to 'My Account' and click on 'Account Settings'. There you will
                            find the option to deactivate your account permanently.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqNine')" aria-expanded="false">
                            <span class="plus-icon">+</span> Can I edit my listing after publishing?
                        </a>
                    </h4>
                    <div id="faqNine" class="card-collapse collapse">
                        <p>Yes, you can edit your listing after publishing. Go to 'My Ads', select the item you want to
                            edit, and click 'Edit'. Make your changes and click 'Save' to update your listing.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqTen')" aria-expanded="false">
                            <span class="plus-icon">+</span> How do I report a fraudulent listing?
                        </a>
                    </h4>
                    <div id="faqTen" class="card-collapse collapse">
                        <p>If you come across a fraudulent listing, click the 'Report' button on the listing page. Provide a
                            brief description of the issue, and our team will investigate it promptly.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqEleven')" aria-expanded="false">
                            <span class="plus-icon">+</span> How do I search for items on the site?
                        </a>
                    </h4>
                    <div id="faqEleven" class="card-collapse collapse">
                        <p>To search for items, simply use the search bar at the top of the page. Enter keywords related to
                            the item you're looking for, and the system will display relevant results.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqTwelve')" aria-expanded="false">
                            <span class="plus-icon">+</span> How do I update my payment details?
                        </a>
                    </h4>
                    <div id="faqTwelve" class="card-collapse collapse">
                        <p>To update your payment details, go to the 'My Account' section and click on 'Payment Methods'.
                            You can add, update, or remove your payment details from this page.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqThirteen')" aria-expanded="false">
                            <span class="plus-icon">+</span> How do I increase the visibility of my listing?
                        </a>
                    </h4>
                    <div id="faqThirteen" class="card-collapse collapse">
                        <p>You can increase the visibility of your listing by selecting paid options like 'Featured Listing'
                            or 'Top Ad' during the listing process. You can also share your listing on social media for more
                            exposure.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqFourteen')" aria-expanded="false">
                            <span class="plus-icon">+</span> Can I change my email address?
                        </a>
                    </h4>
                    <div id="faqFourteen" class="card-collapse collapse">
                        <p>Yes, you can change your email address in the 'My Account' section under 'Edit Profile'. Simply
                            update the email field and save your changes.</p>
                    </div>
                </div>

                <div class="faq-card">
                    <h4 class="faq-title">
                        <a class="collapsed" onclick="toggleAnswer('faqFifteen')" aria-expanded="false">
                            <span class="plus-icon">+</span> How can I change the category of my listing?
                        </a>
                    </h4>
                    <div id="faqFifteen" class="card-collapse collapse">
                        <p>If you want to change the category of your listing, go to 'My Ads', select the listing you want
                            to edit, and update the category. Once you save the changes, the listing will be moved to the
                            new category.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        function toggleAnswer(faqId) {
            const answer = document.getElementById(faqId);
            const isCollapsed = answer.classList.contains('collapse');

            if (isCollapsed) {
                answer.classList.remove('collapse');
                answer.style.display = 'block';
            } else {
                answer.classList.add('collapse');
                answer.style.display = 'none';
            }


        }
    </script>

    <style>
        .faq-heading {
            font-family: 'Arial', sans-serif;
            font-size: 36px;
            font-weight: 700;
            color: #333;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
            position: relative;
        }

        .faq-heading::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #007bff, #00c6ff);
            border-radius: 10px;
        }

        .faq-heading {
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        function toggleAnswer(faqId) {
            const answer = document.getElementById(faqId);
            const isCollapsed = answer.style.display === 'none';

            answer.style.display = isCollapsed ? 'block' : 'none';

            const plusIcon = document.querySelector(`a[onclick="toggleAnswer('${faqId}')"] .plus-icon`);
            plusIcon.textContent = isCollapsed ? '-' : '+';
        }
    </script>
    <style>
        .faq-card {
            border: 1px solid #ddd;
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .faq-title a {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 10px 0;
            transition: all 0.3s ease;
        }

        .faq-title a:hover {
            color: #007bff;
        }

        .faq-title a:hover .plus-icon {
            color: #007bff;
            transform: rotate(45deg);
        }

        .faq-title a .plus-icon {
            font-size: 20px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .card-collapse {
            display: none;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .faq-card .collapsed~.card-collapse {
            display: block;
        }

        .faq-card:hover {
            background-color: transparent;
        }

        .faq-card:hover .faq-title a {
            cursor: pointer;
        }

        .faq-card p {
            color: #555;
            font-size: 16px;
        }

        .faq-card:hover {
            box-shadow: none;
        }

        .faq-card .collapsed {
            cursor: pointer;
        }
    </style>
@endsection

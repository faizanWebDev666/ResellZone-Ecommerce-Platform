@extends('frontend.layouts.main')
@section('title', 'Terms & Conditions | ResellZone')

@section('main-container')
    <div class="aboutbanner innerbanner"
        style="background: linear-gradient(135deg, #2a2a72, #009ffd); color: white; padding: 80px 0; position: relative; text-align: center;">
        <div class="inner-breadcrumb" style="background:  #2a2a72(0, 0, 0, 0.5); padding: 20px; border-radius: 10px;">
            <div class="container" style="max-width: 1200px; margin: 0 auto;">
                <div class="row align-items-center text-center">
                    <div class="col-md-12 col-12">

                        <h2 class="breadcrumb-title"
                            style="font-size: 3rem; margin-top:8%;font-family: 'Poppins', sans-serif; margin-bottom: 20px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                            Terms&Conditions
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="terms-content py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="terms-info">
                        @php
                            $terms = [
                                [
                                    'title' => 'Terms of Service',
                                    'content' =>
                                        'By accessing and using ResellZone, you agree to comply with these terms and all applicable laws and regulations. You are responsible for ensuring that any content you post, including listings, complies with our policies and does not violate any local, national, or international laws. Failure to adhere to these terms may result in suspension or termination of your account.',
                                ],
                                [
                                    'title' => 'User Responsibilities',
                                    'content' =>
                                        'As a user of ResellZone, you are responsible for providing accurate, complete, and current information in your listings. You agree not to post any content that is misleading, fraudulent, or infringes on the rights of others. ResellZone is not responsible for the accuracy or legality of the items listed by users, and all transactions are conducted at your own risk.',
                                ],
                                [
                                    'title' => 'Limitations of Liability',
                                    'content' =>
                                        'ResellZone acts as a platform for users to buy and sell items. We do not participate in the transactions between buyers and sellers. As such, ResellZone is not liable for any direct, indirect, or incidental damages arising from transactions conducted through the platform. Users are encouraged to conduct their own due diligence before completing any purchase.',
                                ],
                                [
                                    'title' => 'Prohibited Activities',
                                    'content' =>
                                        'Users are prohibited from posting content that is illegal, harmful, or violates the rights of others, including but not limited to counterfeit items, stolen goods, or prohibited services. Any violation of these rules may result in the removal of your listing and the suspension of your account. ResellZone reserves the right to remove content at its discretion.',
                                ],
                                [
                                    'title' => 'Modifications to Terms',
                                    'content' =>
                                        'ResellZone reserves the right to modify these terms at any time. You will be notified of any significant changes via the platform, and continued use of ResellZone after such changes constitutes your acceptance of the updated terms. It is your responsibility to review these terms periodically for updates.',
                                ],
                                [
                                    'title' => 'Governing Law',
                                    'content' =>
                                        'These terms are governed by and construed in accordance with the laws of the applicable jurisdiction. Any disputes arising from your use of ResellZone will be resolved in the courts of that jurisdiction, and you consent to the exclusive jurisdiction of such courts.',
                                ],
                            ];
                        @endphp

                        @foreach ($terms as $key => $term)
                            <div class="mb-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="badge badge-primary rounded-circle mr-3" style="width: 40px; height: 40px;">
                                        <span class="text-white font-weight-bold"
                                            style="font-size: 18px;">{{ $key + 1 }}</span>
                                    </div>
                                    <h5 class="page-title text-primary m-0">{{ $term['title'] }}</h5>
                                </div>
                                <p class="text-muted ml-5" style="text-align: justify;">
                                    {{ $term['content'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .terms-content {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 30px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .terms-info .page-title {
            font-size: 20px;
            font-weight: bold;
        }

        .terms-info p {
            line-height: 1.8;
            font-size: 16px;
        }

        .badge-primary {
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .badge-primary span {
            font-size: 14px;
            font-weight: bold;
        }

        .terms-content p:hover {
            color: #0056b3;
        }

        .terms-content h5:hover {
            text-decoration: underline;
        }
    </style>

    <style>
        .terms-content .page-title {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .terms-content p {
            line-height: 1.8;
            font-size: 16px;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
            color: #007bff;
        }

        .text-primary {
            color: #007bff !important;
        }
    </style>
@endsection

@extends('frontend.layouts.main')
@section('title', 'Categories_Options')
@section('main-container')
    <div class="breadcrumb-bar bg-light py-3">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-12">
                    <h2 class="breadcrumb-title mb-0">Categories</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb mt-2">
                        <ol class="breadcrumb justify-content-center">
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <<div class="custom-container my-5">
        <div class="container my-5">
            <div class="text-center mb-4">
                <h2> <span class="text-primary">Embrace yourself to work with ReSellZone</span></h2>
            </div>
            <div class="list-group">
                <a href="{{ URL::to('SellForm') }}"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    Click To Fill Form </a>
            </div>
        </div>
  </div>


        <style>
            h2 {
                font-weight: 700;
                font-size: 2rem;
                color: #343a40;
            }

            .text-primary {
                color: #007bff !important;
            }

            .list-group-item {
                font-size: 1.1rem;
                padding: 20px;
                background-color: #ffffff;
                border: 1px solid #e0e0e0;
                margin-bottom: 10px;
                border-radius: 5px;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            .list-group-item:hover {
                background-color: #f1f3f5;
                transform: translateY(-3px);
            }

            .badge {
                font-size: 0.9rem;
                padding: 10px 15px;
            }

            .list-group-item-action.active,
            .list-group-item-action:focus {
                background-color: #007bff;
                color: #ffffff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .custom-container {
                max-width: 700px;
                margin: auto;
                background-color: black;
                border-radius: 10px;
                padding: 30px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
    @endsection

@extends('frontend.layouts.main')
@section('title', 'Shopping Cart | ResellZone')

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
                            Your Cart Items
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
                                    <span style="color: white;">> Cart</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="main-wrapper">
        <div class="container py-5">
            <div class="row g-4">

                <!-- Shopping Cart Section -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-3 p-4">
                        <div class="card-header d-flex justify-content-between align-items-center"
                            style="background-color: #C40032; border-radius: 12px; padding: 10px 15px;">
                            <h4 class="mb-0" style="color: white;">Your Shopping Cart</h4>
                            @if (!$cartItems->isEmpty())
                                <a href="{{ URL::to('clearCart') }}" class="btn btn-light btn-sm fw-bold"
                                    onclick="return confirmClear()">Clear Cart</a>
                            @endif
                        </div>


                        <script>
                            function confirmClear() {
                                return confirm("Are you sure you want to delete all items from your cart?");
                            }
                        </script>

                        @if (session()->has('success'))
                            <div class="alert alert-success mt-3">{{ session()->get('success') }}</div>
                        @endif

                        @php $total = 0; @endphp <!-- Ensure $total is always defined -->

                        @if ($cartItems->isEmpty())
                            <p class="text-center text-muted py-4">Your cart is empty</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle mt-3">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th>Remove</th>
                                            <th>Product</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr class="border-bottom">
                                                <td>
                                                    <a href="{{ URL::to('deleteCartItem/' . $item->id) }}"
                                                        class="text-danger">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <img src="{{ $item->product_image ?? asset('default-image.jpg') }}"
                                                        class="img-fluid rounded shadow-sm" alt="product-img"
                                                        style="width: 80px; height: 80px; object-fit: cover;">
                                                </td>
                                                <td class="fw-bold">{{ $item->title }}</td>
                                                <td class="text-danger fw-bold">PKR {{ number_format($item->price, 2) }}</td>
                                                <td>
                                                    <form action="{{ URL::to('updateCart') }}" method="post"
                                                        class="d-flex align-items-center">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary btn-sm decrease">-</button>
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                                            min="1"
                                                            class="text-center fw-bold border-0 bg-light px-2 mx-1"
                                                            style="width: 50px;">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary btn-sm increase">+</button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm ms-2">Update</button>
                                                    </form>
                                                </td>
                                                <td class="fw-bold">PKR {{ number_format($item->price * $item->quantity, 2) }}
                                                </td>
                                            </tr>
                                            @php $total += $item->price * $item->quantity; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="col-lg-4">
                    <div class="card shadow-lg" style="padding: 20px; border-radius: 12px;">
                        <h5 class="text-center border-bottom"
                            style="color: #C40032; font-weight: bold; padding-bottom: 10px;">
                            Order Summary
                        </h5>
                        <table class="table table-borderless">
                            <tr>
                                <td style="color: gray;">Subtotal:</td>
                                <td style="font-weight: bold;">PKR {{ number_format($total, 2) }}</td>
                            </tr>
                            <tr>
                                <td style="color: gray;">Shipping:</td>
                                <td style="font-weight: bold;">PKR 250.00</td>
                            </tr>
                            <tr class="border-top">
                                <td style="font-weight: bold; color: #C40032;">Total:</td>
                                <td style="font-weight: bold; color: #C40032;">PKR {{ number_format($total + 250, 2) }}
                                </td>
                            </tr>
                        </table>
                        <a href="{{ route('checkout') }}" class="btn w-100 shadow-sm mt-3"
                            style="background-color: #C40032; color: white; padding: 15px; border-radius: 8px; font-weight: bold;">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>


                <!-- Coupon Code Input -->
               

            </div>

        </div>
        </div>
    </main>

    <style>
        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 12px 12px 0 0;
        }

        .table th {
            padding: 12px;
        }

        .table td {
            vertical-align: middle;
        }

        .btn-danger {
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-danger:hover {
            background-color: #C40032
        }

        .btn-outline-secondary {
            font-size: 14px;
            padding: 5px 12px;
            border-radius: 6px;
        }

        .input-group input {
            border: 2px solid #ddd;
            height: 50px;
            border-radius: 8px;
            padding-left: 15px;
        }

        .input-group button {
            border-radius: 8px;
            height: 50px;
        }

        .shadow-lg {
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
        }

        .rounded-pill {
            border-radius: 30px;
        }

        .text-danger {
            color: #dc3545 !important;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.decrease').forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = this.nextElementSibling; // Selects the next input field
                    let currentValue = parseInt(input.value);
                    if (currentValue > 1) {
                        input.value = currentValue - 1;
                    }
                });
            });

            document.querySelectorAll('.increase').forEach(function(button) {
                button.addEventListener('click', function() {
                    let input = this.previousElementSibling; // Selects the previous input field
                    let currentValue = parseInt(input.value);
                    input.value = currentValue + 1;
                });
            });
        });
    </script>


@endsection

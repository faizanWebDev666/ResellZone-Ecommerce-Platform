@extends('frontend.layouts.OnlyHeader')
@section('title', 'Checkout | ResellZone')
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
                            Checkout Items
                        </h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb"
                                style="display: inline-block; background: none; padding: 0; margin: 0; font-size: 1.2rem; font-family: 'Roboto', sans-serif; color: white; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                                <li class="breadcrumb-item" style="display: inline; color: white;">
                                    <a href="/"
                                        style="color: #ffd700; text-decoration: none; font-weight: bold;">Home</a>
                                    <span style="color: white;">> Checkout</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="main-wrapper bg-light py-5">
        <div class="container">
            <form action="{{ URL::to('placeOrder') }}" method="POST" id="checkout-form">
                @csrf
                <div class="row g-4">
                    <!-- Billing Details Section -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-lg rounded-3 p-4">
                            <h4 class="fw-bold mb-4 border-bottom pb-2" style="color: #C40032;">Billing Details</h4>
    
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label text-dark fw-semibold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fullname" class="form-control custom-input" 
                                           value="{{ $user->name ?? '' }}" required readonly>
                                </div>
                                
                                                                
                                <div class="mb-3">
                                    <label class="form-label text-dark fw-semibold">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="adress" class="form-control custom-input" placeholder="House number and street name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-dark fw-semibold">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control custom-input" placeholder="Enter Your Phone Number" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-dark fw-semibold">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control custom-input" 
                                           value="{{ $user->email ?? '' }}" required readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label text-dark fw-semibold">Short Message (Optional)</label>
                                    <textarea name="msg" class="form-control custom-input" rows="3" placeholder="Special delivery instructions"></textarea>
                                </div>
                                <input type="hidden" name="bill" value="{{ $total }}">
                            </div>
                        </div>
                    </div>
    
                    <!-- Order Summary & Payment Section -->
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-lg rounded-3 p-4">
                            <h4 class="fw-bold mb-4 border-bottom pb-2" style="color: #C40032;">Your Order</h4>
    
                            <div class="table-responsive">
                                <table class="table border text-center align-middle">
                                    <thead class="bg-danger text-white">
                                        <tr>
                                            <th>Product</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @forelse ($cartItems as $item)
                                            <tr>
                                                <td class="text-start">
                                                    <span class="fw-bold d-block">{{ $item->title }}</span> 
                                                    <div class="d-flex justify-content-center">
                                                        <span class="badge bg-secondary px-3 py-2">Qty: {{ $item->quantity }}</span>
                                                    </div>
                                                </td>
                                                
                                                <td class="fw-bold text-dark">PKR {{ number_format($item->price * $item->quantity, 2) }}</td>
                                            </tr>
                                            @php $total += $item->price * $item->quantity; @endphp
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-muted">Your cart is empty.</td>
                                            </tr>
                                        @endforelse
                                        <tr class="fw-bold border-top">
                                            <td>Subtotal</td>
                                            <td class="text-success">PKR {{ number_format($total, 2) }}</td>
                                        </tr>
                                        <tr class="bg-danger text-white fw-bold">
                                            <td>Total</td>
                                            <td>PKR {{ number_format($total + 250, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                        <!-- Payment Method Section -->
                        <div class="card border-0 shadow-lg rounded-3 p-4 mt-4">
                            <h4 class="fw-bold mb-4 border-bottom pb-2" style="color: #C40032;">Choose Payment Method</h4>
    
                            <div class="row g-3">
                                <!-- Cash on Delivery (COD) Option -->
                                <div class="col-md-6">
                                    <label class="payment-option card shadow-sm text-center p-3">
                                        <input class="form-check-input d-none" type="radio" name="payment_method" id="cod" value="COD" checked>
                                        <img src="{{ asset('frontend/img/cash-on-delivery.png') }}" alt="COD" class="payment-logo mb-2" style="width: 30px; margin-right: 10px;">
                                        <span class="fw-bold text-dark">Cash on Delivery</span>
                                    </label>
                                </div>
    
                                <!-- Stripe Option -->
                                <div class="col-md-6">
                                    <label class="payment-option card shadow-sm text-center p-3">
                                        <input class="form-check-input d-none" type="radio" name="payment_method" id="stripe" value="Stripe">
                                        <img src="{{ asset('frontend/img/stripe.png') }}" alt="Stripe" class="payment-logo mb-2"  style="width: 30px; margin-right: 10px;">
                                        <span class="fw-bold text-dark">Pay via Stripe</span>
                                    </label>
                                </div>
                            </div>
                          
    
                            <!-- Stripe Payment Button (Hidden by Default) -->
                            <div id="stripe-payment" class="d-none mt-3">
                                <button type="button" id="stripe-btn"
                                    class="btn btn-primary w-100 shadow-lg py-2 fw-bold">
                                    <img src="{{ asset('frontend/img/stripe.png') }}" alt="Stripe Logo" style="width: 20px; margin-right: 10px;">
                                    Pay with Stripe
                                </button>
                            </div>
    
                            <button type="submit"
                                id="place-order-btn"
                                class="btn w-100 shadow-lg mt-4"
                                style="background-color: #C40032; color: white; padding: 15px; border-radius: 8px; font-weight: bold;">
                                <i class="fas fa-shopping-cart me-2"></i> Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const codRadio = document.getElementById('cod');
            const stripeRadio = document.getElementById('stripe');
            const stripePaymentDiv = document.getElementById('stripe-payment');
            const placeOrderBtn = document.getElementById('place-order-btn');
            const checkoutForm = document.getElementById('checkout-form');
    
            function togglePaymentButtons() {
                if (stripeRadio.checked) {
                    stripePaymentDiv.classList.remove('d-none');
                    placeOrderBtn.classList.add('d-none');
                } else {
                    stripePaymentDiv.classList.add('d-none');
                    placeOrderBtn.classList.remove('d-none');
                }
            }
    
            codRadio.addEventListener('change', togglePaymentButtons);
            stripeRadio.addEventListener('change', togglePaymentButtons);
    
            // Ensure form submits before redirecting to Stripe
            document.getElementById('stripe-btn').addEventListener('click', function () {
                checkoutForm.submit();
            });
        });
    </script>
    
    <style>
        .custom-input {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 16px;
    transition: all 0.3s ease-in-out;
    background-color: #f8f9fa; /* Light grey background */
}

.custom-input:focus {
    border-color: #dc3545; /* Bootstrap danger color (red) */
    box-shadow: 0px 0px 8px rgba(220, 53, 69, 0.3);
    background-color: #ffffff;
    outline: none;
}

.custom-input:hover {
    border-color: #dc3545;
}

textarea.custom-input {
    resize: none;
    min-height: 120px;
}
.card {
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

.table {
    border-radius: 8px;
    overflow: hidden;
}

.table thead {
    background: linear-gradient(to right, #dc3545, #b22234);
    border-radius: 8px;
}

.table th, .table td {
    padding: 14px;
    font-size: 16px;
}

.shipping-options {
    gap: 10px;
}

.custom-radio {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 6px;
    background-color: #f8f9fa;
    transition: all 0.3s ease-in-out;
}

.custom-radio input {
    margin-right: 10px;
}

.custom-radio:hover {
    background-color: #ececec;
}

.btn-danger {
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-danger:hover {
    background-color: #C40032;
}

.btn-danger i {
    font-size: 20px;
}


    .payment-option {
position: relative;
cursor: pointer;
transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.payment-option:hover {
transform: scale(1.03);
box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Add a "thumb" on hover */
.payment-option:hover::after {
content: '👍'; /* Emoji or any symbol */
position: absolute;
top: 10px;
right: 10px;
font-size: 24px;
color: #C40032; /* Match your theme */
}

</style>
@endsection

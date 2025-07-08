@extends('frontend.layouts.main')
@section('title', 'My Wishlist | ResellZone')

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
                    ReSellZone🔄
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
    <div class="container my-5 wishlist-container d-flex flex-column align-items-center">
        <h2 class="wishlist-title">My Wishlist</h2>

        <div class="card wishlist-card mt-4 shadow-lg w-100">
            <table class="table table-hover text-center align-middle">
                <thead style="background-color: #C40032; color: white;">
                    <tr>

                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlistItems as $item)
                        <tr>
                     <td>
    <a href="{{ route('product-details', ['id' => $item->productId]) }}">
        <img src="{{ $item->picture ?? asset('default-image.jpg') }}"
            class="product-img shadow-sm" alt="Product Image">
    </a>
</td>
<td class="fw-bold">
    <a href="{{ route('product-details', ['id' => $item->productId]) }}"
        class="text-dark text-decoration-none">
        {{ $item->title }}
    </a>
</td>


                            <td class="text-primary fw-bold">PKR {{ number_format($item->price, 2) }}</td>
                            <td>
                                <span class="badge bg-success p-2">In Stock</span>
                            </td>
                           
                            <td>
                                <form action="{{ route('wishlist.delete', ['productId' => $item->id]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">🗑 Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateQuantity(button, change) {
            let input = button.parentElement.querySelector('input[name="quantity"]');
            let newValue = parseInt(input.value) + change;
            if (newValue >= 1) input.value = newValue;
        }
    </script>
<style>
    body {
        background-color: #f8f9fa;
    }

    .wishlist-container {
        max-width: 1200px;
        margin: auto;
    }

    .wishlist-title {
        font-weight: bold;
        font-size: 20px;
        color: #C40032;
        text-align: center;
        padding: 15px;
        background: white;
        border-radius: 8px;
    
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
        margin-top: 50px;
        width: 100%; /* Makes it full width */
    max-width: 600px; /* Adjust this as needed */
    }


    .wishlist-card {
        border-radius: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        background: #fff;
        border-left: 6px solid #C40032;
        padding: 25px;
        max-width: 98%;
    }

    .btn-custom {
        background-color: #C40032;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #600000;
    }

    .btn-outline-danger:hover {
        background-color: #C40032;
        color: #fff;
    }

    .product-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        transition: transform 0.3s;
    }

    .product-img:hover {
        transform: scale(1.05);
    }

    .quantity-controls {
        width: 140px;
    }

    table tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>

@endsection

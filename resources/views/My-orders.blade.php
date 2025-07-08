



@extends('frontend.layouts.main')
@section('title', 'Privacy Policy | ResellZone')

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
                    Privacy Policy
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
<div class="container py-4">
    <h3>Your Orders</h3>

    @if($orders->isEmpty())
        <p>You have no orders yet.</p>
    @else
        @foreach($orders as $order)
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Order #{{ $order->id }}</strong> - 
                    <span>Status: {{ $order->status }}</span> <br>
                    <small>Placed on: {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</small>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $order->fullname }}</p>
                    <p><strong>Address:</strong> {{ $order->adress }}</p>
                    <p><strong>Total Bill:</strong> Rs {{ $order->bill }}</p>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td><img src="{{ $item->product_image }}" width="60" alt="Product Image">
</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rs {{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 
use Illuminate\Support\Facades\DB;// Import the Order model

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::select('id', 'customer_name', 'total_price', 'created_at') // Fetch orders with date
                       ->orderBy('created_at', 'desc') // Order by latest first
                       ->get();

        return view('index', compact('order')); // Pass orders to view
    }

    public function myOrders()
{
    if (!session()->has('id')) {
        return redirect()->route('login')->with('error', 'Please log in to view your orders.');
    }

    $userId = session('id');

    $orders = DB::table('orders')
        ->where('customerId', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    foreach ($orders as $order) {
        $order->items = DB::table('order_items')
            ->join('products', 'order_items.productId', '=', 'products.id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('order_items.orderId', $order->id)
            ->select(
                'products.title',
                'order_items.quantity',
                'order_items.price',
                DB::raw('MIN(product_images.product_images) as product_image')
            )
            ->groupBy('products.title', 'order_items.quantity', 'order_items.price')
            ->get();
    }

    return view('My-orders', compact('orders'));
}

}

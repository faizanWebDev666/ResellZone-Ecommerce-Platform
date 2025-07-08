<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
{
    if (!session()->has('id')) {
        return redirect()->route('login')->with('error', 'Please log in to proceed to checkout.');
    }

    // Fetch user details
    $user = User::find(session('id'));

    if (!$user) {
        return redirect()->route('login')->with('error', 'User not found.');
    }

    // Fetch cart items
    $cartItems = Product::with('productImages')
        ->join('carts', 'carts.productId', '=', 'products.Id')
        ->where('carts.customerId', session()->get('id'))
        ->select('products.*', 'carts.*')
        ->get();

    $total = $cartItems->sum(fn($item) => $item->price * $item->quantity + 250);

    return view('checkout', compact('cartItems', 'total', 'user'));
}

     //Order Placement where mail
    //  public function placeOrder(Request $request)
    //  {
    //      if (!session()->has('id')) {
    //          return redirect('login')->with('error', 'Info! Please Login to System.');
    //      }
 
    //      $userId = session()->get('id');
 
    //      // Create a new Order
    //      $order = new Order();
    //      $order->status = "Pending";
    //      $order->customerId = $userId;
    //      $order->bill = $request->input('bill');
    //      $order->adress = $request->input('adress');
    //      $order->fullname = $request->input('fullname');
    //      $order->phone = $request->input('phone');
    //      $order->email = $request->input('email');
    //      $order->msg = $request->input('msg');
    //      $order->payment_method = $request->input('payment_method'); // Save Payment Method
 
    //      if ($order->save()) {
    //          $cartItems = Cart::where('customerId', $userId)->get();
    //          $orderItems = [];
 
    //          foreach ($cartItems as $item) {
    //              $product = Product::find($item->productId);
    //              if (!$product) continue;
 
    //              $orderItem = new OrderItem();
    //              $orderItem->productId = $item->productId;
    //              $orderItem->quantity = $item->quantity;
    //              $orderItem->price = $product->price;
    //              $orderItem->orderId = $order->id;
    //              $orderItem->save();
 
    //              // Prepare Stripe line items
    //              $orderItems[] = [
    //                  'price_data' => [
    //                      'currency' => 'pkr',
    //                      'product_data' => ['name' => $product->title],
    //                      'unit_amount' => $product->price * 100,
    //                  ],
    //                  'quantity' => $item->quantity,
    //              ];
    //          }
 
    //          if ($request->input('payment_method') === 'COD') {
    //              // Empty the cart for COD orders
    //              Cart::where('customerId', $userId)->delete();
 
    //              $this->sendOrderConfirmationEmail($order);
 
    //              return redirect()->back()->with('success', 'Congratulations! Your Order Has been placed.');
    //          } 
             
    //          elseif ($request->input('payment_method') === 'Stripe') {
    //              return redirect()->route('stripe.checkout', ['order_id' => $order->id]);
    //          }
    //      }
 
    //      return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    //  }
 
    //  private function sendOrderConfirmationEmail($order)
    //  {
    //      $user = User::find($order->customerId);
 
    //      if ($user) {
    //          $details = [
    //              'title' => "Order Confirmation - Order #{$order->id} - ResellZone",
    //              'message' => "Dear {$order->fullname},\n\n" .
    //                  "Your order has been placed successfully. Our team is now processing your order.\n\n" .
    //                  "**Order Details:**\n" .
    //                  "- **Order ID:** {$order->id}\n" .
    //                  "- **Total Amount:** PKR {$order->bill}\n" .
    //                  "- **Payment Method:** {$order->payment_method}\n" .
    //                  "- **Delivery Address:** {$order->adress}\n\n" .
    //                  "Thank you for choosing **ResellZone**!\n\n" .
    //                  "**Best regards,**\n" .
    //                  "**The ResellZone Team**\n\n" .
    //                  "© 2025 ResellZone. All rights reserved."
    //          ];
 
    //          Mail::to($user->email)->send(new \App\Mail\orderConfirmation($details));
    //      }
    //  }
   public function placeOrder(Request $request)
{
    if (!session()->has('id')) {
        return redirect()->route('login')->with('error', 'Info! Please Login to System.');
    }

    $userId = session()->get('id');

    $cartItems = Cart::where('customerId', $userId)->get();

    foreach ($cartItems as $item) {
        $product = Product::find($item->productId);
        if ($product && $product->user_id == $userId) {
            return redirect()->back()->with('error', 'You cannot place an order on your own product.');
        }
    }

    $order = new Order();
    $order->status = "Pending";
    $order->customerId = $userId;
    $order->bill = $request->input('bill');
    $order->adress = $request->input('adress');
    $order->fullname = $request->input('fullname');
    $order->phone = $request->input('phone');
    $order->email = $request->input('email');
    $order->msg = $request->input('msg');
    $order->payment_method = $request->input('payment_method');

    if ($order->save()) {
        $orderItems = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item->productId);
            if (!$product) continue;

            $orderItem = new OrderItem();
            $orderItem->productId = $item->productId;
            $orderItem->quantity = $item->quantity;
            $orderItem->price = $product->price;
            $orderItem->orderId = $order->id;
            $orderItem->save();

            $orderItems[] = [
                'name' => $product->title,
                'quantity' => $item->quantity,
                'price' => $product->price,
            ];
        }

        if ($request->input('payment_method') === 'COD') {
            Cart::where('customerId', $userId)->delete();
            $this->sendOrderConfirmationEmail($order, $orderItems);

            return redirect()->back()->with('success', 'Congratulations! Your Order Has been placed.');
        } 
        elseif ($request->input('payment_method') === 'Stripe') {
            return redirect()->route('stripe.checkout', ['order_id' => $order->id]);
        }
    }

    return redirect()->back()->with('error', 'Something went wrong. Please try again.');
}

    private function sendOrderConfirmationEmail($order, $orderItems)
    {
        $user = User::find($order->customerId);

        if ($user) {
            $details = [
                'customer_name' => $order->fullname,
                'order_number' => $order->id,
                'order_date' => now()->format('F j, Y'),
                'items' => $orderItems,
                'total_amount' => $order->bill,
                'payment_method' => $order->payment_method,
                'delivery_address' => $order->adress,
            ];

            Mail::to($user->email)->send(new \App\Mail\orderConfirmation($details));
        }
    }
 } 


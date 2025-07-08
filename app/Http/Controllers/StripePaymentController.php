<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Charge;
use App\Models\Order;
use Carbon\Carbon;
class StripePaymentController extends Controller
{
    //Initiates the checkout process and creates a Stripe PaymentIntent.
    public function stripecheckout()
{
    Stripe::setApiKey(config('services.stripe.secret'));

    $user = auth()->user(); // Get logged-in user
    $amount = 200 * 100; // e.g., 200 AED in fils

    // 1. Create Stripe Customer if not already saved
    if (!$user->stripe_id) {
        $customer = User::create([
            'email' => $user->email,
            'name' => $user->name,
        ]);

        $user->stripe_id = $customer->id;
        $user->save();
    } else {
        $customer = User::retrieve($user->stripe_id);
    }

    // 2. Create a PaymentIntent with the customer
    try {
        $paymentIntent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'aed',
            'payment_method_types' => ['card'],
            'description' => 'ResellZone Purchase',
            'customer' => $customer->id,
        ]);

        return view('stripe', [
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
    public function afterPayment()
{
    return view('payment-success'); // Create a success page
}

// public function showPayments()
// {
//     Stripe::setApiKey(config('services.stripe.secret'));

//     try {
//         $charges = Charge::all(['limit' => 10]);
//         \Log::info('Stripe Response: ', $charges->toArray());

//         if (empty($charges->data)) {
//             return back()->with('error', 'No payments found.');
//         }

//         $payments = $charges->data;

//         foreach ($payments as $payment) {
//             // Find user using stripe_id
//             $user = User::where('stripe_id', $payment->customer)->first();
            
//             // Find order using user ID
//             $order = Order::where('customerId', $user->id ?? null)->latest()->first();

//             // Assign values
//             $payment->user = $user;
//             $payment->payment_method = $order->payment_method ?? 'Unknown'; 
//             $payment->order_status = $order->status ?? 'Unknown'; // Fetch order status
//         }

//         return view('backend.payments', compact('payments'));
//     } catch (\Exception $e) {
//         \Log::error('Stripe Error: ' . $e->getMessage());
//         return back()->with('error', 'Failed to fetch payments: ' . $e->getMessage());
//     }
// }

public function showPayments()
{
    Stripe::setApiKey(config('services.stripe.secret'));

    $allPayments = [];

    // ============ Stripe Payments ============
    try {
        $charges = Charge::all(['limit' => 20]);

        foreach ($charges->data as $charge) {
            $user = User::where('stripe_id', $charge->customer)->first();
            $order = $user ? Order::where('customerId', $user->id)->latest()->first() : null;

            $allPayments[] = (object)[
                'user' => $user,
                'amount' => $charge->amount,
                'payment_method' => 'Stripe',
                'order_status' => $order->status ?? 'Pending',
                'created_at_pakistan' => Carbon::createFromTimestamp($charge->created)
                                                ->setTimezone('Asia/Karachi')
                                                ->format('Y-m-d h:i A'),
            ];
        }
    } catch (\Exception $e) {
        \Log::error('Stripe Error: ' . $e->getMessage());
    }

    // ============ COD Orders ============
    $codOrders = Order::where('payment_method', 'cod')->latest()->get();

    foreach ($codOrders as $order) {
        $user = User::find($order->customerId);

        $allPayments[] = (object)[
            'user' => $user,
            'amount' => $order->total_amount * 100, // to match Stripe format
            'payment_method' => 'COD',
            'order_status' => $order->status ?? 'Pending',
            'created_at_pakistan' => Carbon::parse($order->created_at)
                                            ->setTimezone('Asia/Karachi')
                                            ->format('Y-m-d h:i A'),
        ];
    }

    // Sort all payments by latest
    $payments = collect($allPayments)->sortByDesc('created_at_pakistan');

    return view('backend.payments', compact('payments'));
}
}
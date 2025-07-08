<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Mail\LowRatingAlert;

use App\Models\Order;
use App\Models\Product;
use App\Models\SellersRegistration;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Users;


class AdminController extends Controller
{



    public function sellerRegistrationRequests()
    {
        $sellers = SellersRegistration::all(); // Fetch all records
        return view('backend.sellerRegistrationRequests', compact('sellers'));
    }
    public function approveSeller(Request $request)
{
    $seller = SellersRegistration::find($request->id);

    if (!$seller) {
        return response()->json(['success' => false, 'message' => 'Seller not found']);
    }

    $seller->status = 'approved';
    $seller->save();

    // Send email notification
    $details = [
        'title' => "Congratulations! Your Seller Account is Approved",
        'message' => "Dear {$seller->name},\n\n" .
            "We are excited to inform you that your **ResellZone Seller Account** has been approved! 🎉\n\n" .
            "You can now log in to your seller dashboard and start listing your products for sale.\n\n" .
            "📌 **Login Here:** [ResellZone Seller Dashboard](#)\n\n" .
            "If you have any questions or need assistance, feel free to [contact our support team](#).\n\n" .
            "**Best regards,**\n" .
            "**The ResellZone Team**\n\n" .
            "© " . date('Y') . " ResellZone. All rights reserved."
    ];

    Mail::to($seller->email)->send(new \App\Mail\SellerApprovalNotification($details));

    return response()->json(['success' => true, 'message' => 'Seller approved successfully & email sent']);
}

    public function unapprove(Request $request)
    {
        $seller = SellersRegistration::find($request->id);

        if ($seller) {
            $seller->status = 'pending';
            $seller->save();

            return response()->json(['success' => true, 'message' => 'Seller unapproved successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Seller not found']);
    }

    public function adminContacts()
    {
        $contacts=Contact::all();
        return view('backend.adminContacts',compact('contacts'));
    }
    public function adminSubscriptions()
    {
$subscriptions=Newsletter::all();
        return view('backend.adminSubscriptions',compact('subscriptions'));
    }

    public function updateProfile(Request $request)
{
    // Retrieve user from session
    $admin = User::find(session('id'));

    if (!$admin) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    // Validate request
    $request->validate([
        'admin_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cover_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
    ]);

    // Debugging: Check if file is uploaded
    if ($request->hasFile('admin_profile')) {
        // Delete old image if exists
        if ($admin->admin_profile) {
            Storage::disk('public')->delete($admin->admin_profile);
        }

        // Store new image
        $profilePath = $request->file('admin_profile')->store('profile_images', 'public');

        if (!$profilePath) {
            return redirect()->back()->with('error', 'Failed to upload profile picture.');
        }

        // Debugging: Ensure profile path is set
        $admin->admin_profile = $profilePath;
        \Log::info('Profile Image Path: ' . $profilePath);
    }

    // Handle cover image upload
    if ($request->hasFile('cover_pic')) {
        if ($admin->cover_pic) {
            Storage::disk('public')->delete($admin->cover_pic);
        }

        $coverPath = $request->file('cover_pic')->store('cover_images', 'public');
        $admin->cover_pic = $coverPath;
    }

    // Debugging: Ensure admin profile is not null
    if (empty($admin->admin_profile)) {
        return redirect()->back()->with('error', 'Profile picture not saved.');
    }

    // Save to database
    $admin->save();

    // Debugging: Check if DB updated
    if (!$admin->wasChanged('admin_profile')) {
        return redirect()->back()->with('error', 'Database update failed.');
    }

    // Store in session after successful save
    session()->put('profile_picture', $admin->admin_profile);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}

    public function adminprofile()
    {

        $admin = User::find(session('id'));
        return view('backend.adminprofile',compact('admin'));
    }
public function Customers()
{
    $users=User::all();
    return view('backend.Customers',compact('users'));
}


public function adminproducts()
{
    $products = Product::with(['productImages', 'ratings', 'seller'])->get();

    foreach ($products as $product) {
        $avgRating = $product->ratings->avg('rating');

        if ($avgRating !== null && $avgRating < 3 && $product->seller && $product->seller->type === 'seller') {
Mail::to($product->seller->email)->send(new LowRatingAlert($product));
        }
    }

    return view('backend.adminproducts', compact('products'));
}





public function showProductsWithSales(Request $request)
{
    $query = DB::table('products')
        ->join('order_items', 'products.id', '=', 'order_items.productId')
        ->join('orders', 'order_items.orderId', '=', 'orders.id')
        ->leftJoin(DB::raw('(SELECT product_id, MIN(product_images) as image FROM product_images GROUP BY product_id) as pi'), 'products.id', '=', 'pi.product_id')
        ->select(
            'products.id',
            'products.title',
            'products.price',
            'products.type',
            'products.category',
            'pi.image',
            DB::raw('SUM(order_items.quantity) as total_units_sold'),
            DB::raw('SUM(order_items.quantity * order_items.price) as total_revenue'),
            'orders.payment_method'
        )
        ->groupBy(
            'products.id',
            'products.title',
            'products.price',
            'products.type',
            'products.category',
            'pi.image',
            'orders.payment_method'
        );

    // ✅ Filter: Date Range
    if ($request->start_date && $request->end_date) {
        $query->whereBetween('orders.created_at', [$request->start_date, $request->end_date]);
    }

    // ✅ Filter: Category
    if ($request->category) {
        $query->where('products.category', $request->category);
    }

    // ✅ Filter: Payment Method
    if ($request->payment_method) {
        $query->where('orders.payment_method', $request->payment_method);
    }

    // ✅ Sorting
    if ($request->sort_by === 'top_selling') {
        $query->orderByDesc(DB::raw('SUM(order_items.quantity)'));
    } elseif ($request->sort_by === 'lowest_selling') {
        $query->orderBy(DB::raw('SUM(order_items.quantity)'));
    }

    $products = $query->get();

    return view('backend.adminTotal-Sales', compact('products'));
}



public function adminOrders()
{
    $Orders = Order::with('orderItems.product')->get();
    return view('backend.adminOrders', compact('Orders'));
}


    public function searchContacts(Request $request)
{
    $query = $request->input('query');
    $contactCount= Contact::where('name', 'LIKE', "%$query%")
        ->orWhere('email', 'LIKE', "%$query%")
        ->orWhere('subject', 'LIKE', "%$query%")
        ->orWhere('message', 'LIKE', "%$query%")
        ->get();

    return view('admin.user-contacts', compact('contacts'));
}

// public function index()
// {
//     // Total Users (Customers)
//     $userCount = User::count();
//     $lastWeekUserCount = User::where('created_at', '>=', now()->subWeek())->count();
//     $userGrowth = $this->calculatePercentageChange($lastWeekUserCount, $userCount);

//     // Total Contacts
//     $contactCount = Contact::count();
//     $lastWeekContactCount = Contact::where('created_at', '>=', now()->subWeek())->count();
//     $contactGrowth = $this->calculatePercentageChange($lastWeekContactCount, $contactCount);

//     // Total Products/Ads
//     $productCount = Product::count();
//     $lastWeekProductCount = Product::where('created_at', '>=', now()->subWeek())->count();
//     $productGrowth = $this->calculatePercentageChange($lastWeekProductCount, $productCount);

//     // Newsletter Subscriptions
//     $newsletterCount = Newsletter::count();
//     $lastWeekNewsletterCount = Newsletter::where('created_at', '>=', now()->subWeek())->count();
//     $newsletterGrowth = $this->calculatePercentageChange($lastWeekNewsletterCount, $newsletterCount);

//     return view('backend.index', compact(
//         'userCount', 'contactCount', 'newsletterCount', 'productCount',
//         'userGrowth', 'contactGrowth', 'productGrowth', 'newsletterGrowth'
//     ));
// }

// /**
//  * Calculate Percentage Change
//  */
// private function calculatePercentageChange($previous, $current)
// {
//     if ($previous == 0) {
//         return $current > 0 ? 100 : 0;
//     }
//     return round((($current - $previous) / $previous) * 100, 2);
// }

public function index()
{
    // Restrict access to admin users only
    if (session('type') !== 'admin') {
        return redirect('/')->with('error', 'Unauthorized access.');
    }

    $userCount = User::count();
    $todayUserCount = User::whereDate('created_at', today())->count();
    $userGrowth = $this->calculatePercentageChange($todayUserCount, $userCount);

    $contactCount = Contact::count();
    $todayContactCount = Contact::whereDate('created_at', today())->count();
    $contactGrowth = $this->calculatePercentageChange($todayContactCount, $contactCount);

    $productCount = Product::count();
    $todayProductCount = Product::whereDate('created_at', today())->count();
    $productGrowth = $this->calculatePercentageChange($todayProductCount, $productCount);

    $newsletterCount = Newsletter::count();
    $todayNewsletterCount = Newsletter::whereDate('created_at', today())->count();
    $newsletterGrowth = $this->calculatePercentageChange($todayNewsletterCount, $newsletterCount);

    $salesData = Product::select('category')
        ->selectRaw('COUNT(*) as total_sales')
        ->groupBy('category')
        ->orderByDesc('total_sales')
        ->get();
       
   $statuses = ['delivered', 'shipped', 'cancelled'];
$orderStatusData = [];
$monthLabels = [];

foreach ($statuses as $status) {
    $results = DB::table('orders')
        ->selectRaw('MONTH(created_at) as month_num, MONTHNAME(created_at) as month, COUNT(*) as total')
        ->where('status', $status)
        ->whereYear('created_at', now()->year)
        ->groupBy('month_num', 'month')
        ->orderBy('month_num')
        ->get();

    // Set the labels only once
    if (empty($monthLabels)) {
        $monthLabels = $results->pluck('month')->toArray();
    }

    $orderStatusData[] = [
        'name' => ucfirst($status),
        'data' => $results->pluck('total')->toArray()
    ];
}

 return view('backend.index', compact(
    'userCount', 'contactCount', 'newsletterCount', 'productCount',
    'userGrowth', 'contactGrowth', 'productGrowth', 'newsletterGrowth',
    'salesData', 'orderStatusData', 'monthLabels'
));

}

/**
 * Calculate Percentage Change
 */
private function calculatePercentageChange($today, $total)
{
    if ($total == 0) {
        return $today > 0 ? 100 : 0;
    }
    return round(($today / $total) * 100, 2);
}

    public function Usercontacts()
    {
        $usercontacts = Contact::all();
        return view('backend.user-contacts', compact('usercontacts'));
    }
    public function sellerRegistration()
    {
        $User = User::where('type', 'seller')->get();
        $seller = SellersRegistration::all();
        return view('backend.sellersRegistration', compact('seller','User'));
    }
    public function Usernewsletters()
    {
        $usernewsletters = Newsletter::all();
        return view('backend.User-newsletters', compact('usernewsletters'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();
            return redirect()->route('user-contacts')->with('success', 'Contact deleted successfully.');
        }

        return redirect()->route('user-contacts')->with('error', 'Contact not found.');
    }
    public function Login_Register_Users()
    {
        $loginsignup = User::all();
        return view('backend.Login_Register_Users', compact('loginsignup'));
    }
    public function destroy1($id)
    {
        $Loginsignup = User::find($id);

        if ($Loginsignup) {
            $Loginsignup->delete();
            return redirect('http://127.0.0.1:8000/Login_Register_Users')->with('success', 'Contact deleted successfully.');

        }
    }
        public function destroy2($id)
    {
        $newsletter = User::find($id);

        if ($newsletter) {
            $newsletter->delete();
            return redirect()->route('User-newsletters')->with('success', 'Newsletter deleted successfully.');
        }

    }

}



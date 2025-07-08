<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\PrivacyPolicy;
use App\Models\SellersRegistration;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Models\OrderItem;
use App\Models\Questions;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use App\Mail\forgotpassword;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
public function markAllAsRead()
{
    Contact::where('status', 'unread')->update(['status' => 'read']);
    return response()->json(['message' => 'All notifications marked as read']);
}

public function clearAll()
{
    Contact::truncate(); // Deletes all records
    return response()->json(['message' => 'All notifications cleared']);
}

    public function getUnreadContacts()
    {
        $contacts = Contact::where('status', 'unread')->latest()->get();
        return response()->json($contacts);
    }

    public function sellerUpdatePassword()
{
return view('sellerUpdatePassword');
}
public function registerSeller()
{
    $User = User::where('type', 'seller')->get();
return view('registerSeller', compact('User'));
}




    // public function sellerregister(Request $data)
    // {
    //     $data->validate([
    //         'name' => 'required|string|max:255',
    //         'store_name' => 'required|string|max:255|unique:sellers_registrations,store_name',
    //         'email' => 'required|email|max:255|unique:sellers_registrations,email', // Updated table name
    //         'contact' => 'required|string|max:20',
    //         'address' => 'required|string',
    //     ]);

    //     // Create a new Seller instance
    //     $seller = new SellersRegistration();
    //     $seller->name = $data->input('name');
    //     $seller->store_name=$data->input('store_name');
    //     $seller->email = $data->input('email');
    //     $seller->contact = $data->input('contact');
    //     $seller->address = $data->input('address');
    //     $seller->status = 'pending'; // Default status before admin approval

    //     // Save the seller details in the database
    //     if ($seller->save()) {
    //         return redirect('/')->with('success', 'Your registration has been submitted we contact you about your store verification');
    //     } else {
    //         return redirect()->back()->with('error', 'An error occurred while submitting the registration.');
    //     }
    // }


    public function sellerregister(Request $request)
{
    // Get the logged-in user
    $user = auth()->user();

    // Check if seller already applied and is pending or approved
    $existing = DB::table('sellers_registrations')
        ->where('user_id', $user->id)
        ->whereIn('status', ['pending', 'approved'])
        ->first();

    if ($existing) {
        return redirect()->back()->with('error', 'You have already applied. Wait for approval.');
    }

    // Validate input data
    $request->validate([
        'name'        => 'required|string|max:255',
        'store_name'  => 'required|string|max:255|unique:sellers_registrations,store_name',
        'email'       => 'required|email|max:255|unique:sellers_registrations,email',
        'contact'     => 'required|string|max:20',
        'address'     => 'required|string',
    ]);

    // Create a new seller registration
    $seller = new SellersRegistration([
        'user_id'     => $user->id,
        'name'        => $request->input('name'),
        'store_name'  => $request->input('store_name'),
        'email'       => $request->input('email'),
        'contact'     => $request->input('contact'),
        'address'     => $request->input('address'),
        'status'      => 'pending',
    ]);

    $seller->save();

    return redirect()->route('home')->with('success', 'Your registration has been submitted. We will contact you for store verification.');
}


    public function downloadOrdersPdf()
    {
        $orders = Order::all();
        $orderItems = OrderItem::all();
        $users = User::all()->keyBy('id'); // Fetch customers using their `id`
        $products = Product::all()->keyBy('id'); // Fetch products using their `id`

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Title
        $section->addText('Orders Report', ['bold' => true, 'size' => 16], ['alignment' => 'center']);
        $section->addTextBreak(1);

        // Table
        $table = $section->addTable();

        // Table Header
        $table->addRow();
        $headers = ['Order ID', 'Product Name', 'Quantity', 'Customer Name', 'Email', 'Phone', 'Address', 'Price', 'Order Status', 'Order Date'];
        foreach ($headers as $header) {
            $table->addCell(2000)->addText($header, ['bold' => true]);
        }

        // Table Data
        foreach ($orders as $order) {
            $customer = $users[$order->customerId] ?? null;
            $orderItem = $orderItems->where('orderId', $order->id)->first();
            $product = $orderItem ? ($products[$orderItem->product_id] ?? null) : null;

            $table->addRow();
            $table->addCell(2000)->addText($order->id);
            $table->addCell(3000)->addText($product ? $product->name : 'Unknown');
            $table->addCell(1500)->addText($orderItem ? $orderItem->quantity : '-');
            $table->addCell(3000)->addText($customer ? $customer->name : 'Unknown');
            $table->addCell(3000)->addText($customer ? $customer->email : '-');
            $table->addCell(3000)->addText($customer ? $customer->phone : '-');
            $table->addCell(4000)->addText($order->address);
            $table->addCell(2000)->addText($orderItem ? '$' . number_format($orderItem->price, 2) : '-');
            $table->addCell(2000)->addText($order->status);
            $table->addCell(2000)->addText($order->created_at->format('d-m-Y'));
        }

        // Save the Word file
        $fileName = 'orders_report.docx';
        $path = storage_path($fileName);
        $wordWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $wordWriter->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }



public function questions()
{
    $questions = Questions::with(['user', 'product'])->get();
    //dd($questions);
    return view('questions', compact('questions'));
}

    public function changeStatus(Request $request)
{
    $order = DB::table('orders')->where('id', $request->id)->first();

    if (!$order) {
        return response()->json(['success' => false, 'message' => 'Order not found']);
    }

    DB::table('orders')->where('id', $request->id)->update(['status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Order status updated']);
}


public function Orders(Request $request)
{
    $sellerId = Auth::id(); // Assuming logged-in seller

    // Base Orders Query
    $query = DB::table('orders')
        ->join('users', 'orders.customerId', '=', 'users.id')
        ->select(
            'orders.*',
            'orders.phone',
            'orders.adress',
            'users.name as customer_name',
            'users.email',
            'users.status as userStatus'
        );

    // [Filtering Logic Here - Same As Before]

    $orders = $query->orderBy('orders.created_at', 'desc')->get();

    // Fetch Order Items
    $orderItems = DB::table('order_items')
        ->join('products', 'order_items.productId', '=', 'products.id')
        ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
        ->select(
            'products.title',
            'products.category',
            'products.user_id', // seller check
            'products.price',
            'product_images.product_images as picture',
            'order_items.*'
        )
        ->get();

    // ✅ Total Listings by Seller
    $totalListings = DB::table('products')
        ->where('user_id', $sellerId)
        ->count();

    // ✅ Delivered Orders Count
    $deliveredOrdersCount = DB::table('orders')
        ->where('status', 'Delivered')
        ->whereExists(function ($query) use ($sellerId) {
            $query->select(DB::raw(1))
                ->from('order_items')
                ->join('products', 'order_items.productId', '=', 'products.id')
                ->whereRaw('order_items.orderId = orders.id')
                ->where('products.user_id', $sellerId);
        })
        ->count();

    // ✅ Pending Orders Count
    $pendingOrdersCount = DB::table('orders')
        ->where('status', 'Pending')
        ->whereExists(function ($query) use ($sellerId) {
            $query->select(DB::raw(1))
                ->from('order_items')
                ->join('products', 'order_items.productId', '=', 'products.id')
                ->whereRaw('order_items.orderId = orders.id')
                ->where('products.user_id', $sellerId);
        })
        ->count();

    // ✅ Total Revenue (only for seller’s products)
    $totalRevenue = DB::table('order_items')
        ->join('products', 'order_items.productId', '=', 'products.id')
        ->join('orders', 'order_items.orderId', '=', 'orders.id')
        ->where('products.user_id', $sellerId)
        ->where('orders.status', 'Delivered')
        ->sum(DB::raw('order_items.price * order_items.quantity'));

    return view('orders', compact(
        'orders',
        'orderItems',
        'totalListings',
        'deliveredOrdersCount',
        'pendingOrdersCount',
        'totalRevenue'
    ));
}








public function showproduct(Request $request)
{
    $wishlistItems = Wishlist::where('customerId', session()->get('id'))->pluck('productId')->toArray();

    $category = $request->input('category');
    $query = $request->input('query');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');
    $city = $request->input('city');
    $minRating = $request->input('rating');

    $product = Product::with('productImages')
        ->withCount(['ratings as reviews_count'])
        ->withAvg('ratings', 'rating')
        ->when(!empty($category), function ($queryBuilder) use ($category) {
            return $queryBuilder->where('category', $category);
        })
        ->when(!empty($query), function ($queryBuilder) use ($query) {
            return $queryBuilder->where('title', 'LIKE', "%{$query}%");
        })
        ->when(!empty($minPrice) && !empty($maxPrice), function ($queryBuilder) use ($minPrice, $maxPrice) {
            return $queryBuilder->whereBetween('price', [$minPrice, $maxPrice]);
        })
        ->when(!empty($minPrice) && empty($maxPrice), function ($queryBuilder) use ($minPrice) {
            return $queryBuilder->where('price', '>=', $minPrice);
        })
        ->when(!empty($maxPrice) && empty($minPrice), function ($queryBuilder) use ($maxPrice) {
            return $queryBuilder->where('price', '<=', $maxPrice);
        })
        ->when(!empty($city), function ($queryBuilder) use ($city) {
            return $queryBuilder->where('city', 'LIKE', "%{$city}%");
        })
        ->when(!empty($minRating), function ($queryBuilder) use ($minRating) {
            return $queryBuilder->having('ratings_avg_rating', '>=', $minRating);
        })
        ->select('products.*')
        ->paginate(1)
        ->appends($request->only(['category']));


    return view('showproduct', compact('product', 'wishlistItems'));
}

    public function buyNow($productId)
    {
        if (!session()->has('id')) {
            return redirect()->route('login')->with('error', 'Please log in to proceed to checkout.');
        }

        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cartItem = Cart::where('customerId', session()->get('id'))
            ->where('productId', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'customerId' => session()->get('id'),
                'productId' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('checkout');
    }

    public function googlesignup()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                    'google_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            return redirect()->route('/');
        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['msg' => 'Something went wrong. Please try again.']);
        }
    }
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google callback
    public function handleGoogle()
    {
        try {
            // Get Google user details
            $googleUser = Socialite::driver('google')->user();

            // Check if user already exists
            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {
                // If user with same email exists but without google_id, prevent conflict
                $existingUser = User::where('email', $googleUser->email)->first();
                if ($existingUser) {
                   return redirect()->route('login')->with('error', 'This email is already in use. Please login manually.');
                }

                // Create a new user
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken ?? null,
                    'password' => Hash::make(uniqid()), // Generate a random password
                    'type' => 'customer' // Default role
                ]);
            } else {
                // Update user's Google tokens if they exist
                $user->update([
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken ?? $user->google_refresh_token,
                ]);
            }

            // Manually set session for user authentication
            Session::put('id', $user->id);
            Session::put('type', $user->type);
            Session::save();

            // Success message
            session()->flash('success', 'Login successful!');

            // Redirect user based on their role
            return ($user->type === 'customer') ? redirect('/') : redirect('/admin');

        } catch (Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage()); // Log the error for debugging
           return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
        }
    }


    public function productdetails($id)
    {
        $product = Product::where('id', $id)->with('productImages')->firstOrFail();

        // Increment views count
        $sessionKey = 'viewed_product_' . $id;

        if (!session()->has($sessionKey)) {
            $product->increment('views');
            session([$sessionKey => true]);
        }

        $question = Product::with('questions.user')->findOrFail($id);

        // Fetch product ratings
        $ratings = Rating::where('product_id', $id)->get();
        $averageRating = $ratings->avg('rating');

        return view('product-details', compact('product', 'ratings', 'averageRating', 'question'));
    }

    public function forgotpassword()
    {

        return view('forgot-password');
    }
    public function eform()
    {

        return view('eform');
    }
    public function blog_details()
    {

        return view(' blog_details');
    }

    public function servicedetails()
    {

        return view('servicedetails');
    }
    public function about()
    {

        return view('about', ['title' => 'About Us']);
    }

    public function blog()
    {

        return view('blog');
    }

    public function contact()
    {

        return view('contact');
    }
  


public function dashboard(Request $request)
{
    if ((session('type') === 'seller' || session('type') === 'admin') && session()->has('id')) {
        $user = User::find(session()->get('id'));

        if (!$user) {
            return redirect('signin')->with('error', 'User not found. Please login again.');
        }

        $seller = SellersRegistration::where('user_id', $user->id)->first();

        if (!$seller || $seller->status === 'pending') {
            return redirect()->route('login')->with('error', 'Access denied! Your seller account is still pending approval.');
        }

        $storeName = $seller->store_name ?? 'Not Available';

        $activeListings = $user->products()->where('status', 'active')->count();
        $totalRatings = $user->ratings()->count();
        $totalQuestions = $user->questions()->count();
        $totalWishlist = $user->wishlist()->count();

        $filter = $request->input('filter', 'today');
        $dateRange = match($filter) {
            'today'       => [Carbon::today(), Carbon::today()->endOfDay()],
            'this_week'   => [now()->startOfWeek(), now()->endOfWeek()],
            'last_week'   => [now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek()],
            'this_month'  => [now()->startOfMonth(), now()->endOfMonth()],
            'last_month'  => [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()],
            default       => [Carbon::minValue(), Carbon::maxValue()],
        };

        $sellerOrders = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.orderId')
            ->join('products', 'order_items.productId', '=', 'products.id')
            ->join('users', 'orders.customerId', '=', 'users.id')
            ->where('products.user_id', $user->id) // you use user_id to link sellers
            ->where('orders.status', 'delivered')
            ->whereBetween('orders.created_at', $dateRange)
            ->select(
                'users.name as customer_name',
                'products.title as product_title',
                'products.category',
                'products.type',
                'orders.payment_method',
                'order_items.quantity',
                DB::raw('order_items.quantity * order_items.price as revenue'),
                'orders.created_at'
            )
            ->orderByDesc('orders.created_at')
            ->get();

        $shippedOrders = Order::where('status', 'shipped')
            ->whereBetween('created_at', $dateRange)
            ->get();

        return view('dashboard', compact(
            'storeName',
            'activeListings',
            'totalRatings',
            'totalQuestions',
            'totalWishlist',
            'sellerOrders',
            'shippedOrders',
            'filter'
        ));
    }

    return redirect()->route('login')->with('error', 'Something went wrong');
}

    
       


    public function wishlist()
    {
        if (!session()->has('id')) {
           return redirect()->route('login')->with('error', 'Please log in to access your wishlist.');
        }
        $wishlistItems = DB::table('products')
            ->join('wishlists', 'wishlists.productId', '=', 'products.Id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.Id')
            ->select(
                'products.Id',
                'products.title',
                'products.price',
                DB::raw('MIN(product_images.product_images) as picture'),
                'wishlists.id', // Add wishlists.id here
                'wishlists.customerId',
                'wishlists.productId',
                'wishlists.created_at' // Add all other columns from wishlists that you're selecting
            )
            ->where('wishlists.customerId', session()->get('id'))
            ->groupBy(
                'products.Id',
                'products.title',
                'products.price',
                'wishlists.id', // Add wishlists.id to GROUP BY
                'wishlists.customerId',
                'wishlists.productId',
                'wishlists.created_at' // Group by any other columns you select from wishlists
            )
            ->get();

        return view('wishlist', compact('wishlistItems'));
    }





    public function index()
    {
        $wishlistItems = Wishlist::where('customerId', session()->get('id'))
            ->pluck('productId')
            ->toArray();

        // Fetch all active products with ratings and review count
        $product = Product::with('productImages')
            ->withAvg('ratings', 'rating') // Fetch average rating
            ->withCount(['ratings as reviews_count' => function ($query) {
                $query->whereNotNull('review'); // Count only rows with reviews
            }])
            ->where('status', 'active')
            ->paginate(8, ['*'], 'products_page');

        // Fetch top-rated products
        $productwithrating = Product::with('productImages')
            ->withAvg('ratings', 'rating')
            ->withCount(['ratings as reviews_count' => function ($query) {
                $query->whereNotNull('review');
            }])
            ->where('status', 'active')
            ->having('ratings_avg_rating', '>=', 4)
            ->paginate(8, ['*'], 'top_rated_page');

        return view('index', compact('product', 'wishlistItems', 'productwithrating'));
    }



        public function faq()
    {

        return view('faq');
    }
    public function forgetpassword()
    {

        return view('forgetpassword');
    }
    public function listingsidebar()
    {


    }
    public function furnitureforms($category)
    {
        return view('furnitureforms', ['category' => $category]);
    }



    public function mylisting()
{
    if (!session()->has('id')) {
        return redirect()->route('login')->with('error', 'Please log in to view your listings.');
    }

    $userId = session('id');

    // Fetch products with their views and productImages relationship
    $products = Product::select('id', 'title', 'description', 'views', 'price', 'status', 'user_id')
                ->where('user_id', $userId)
                ->with('productImages') // eager loading images
                ->orderBy('created_at', 'desc')
                ->get();

    return view('mylisting', compact('products'));
}
    public function privacypolicy()
    {
$policy = PrivacyPolicy::first();
        return view('privacypolicy', compact('policy'));
    }



    public function reviews()
{
    $userId = session('id');

    if (!$userId) {
       return redirect()->route('login')->with('error', 'Please log in to view your reviews.');
    }

    // Fetch reviews given by the logged-in user
    $userReviews = DB::table('ratings')
        ->join('products', 'ratings.product_id', '=', 'products.id') // Get product details
        ->select(
            'ratings.*',
            'products.title as product_title',
            'products.type as product_type',  // Fetch product type
            'products.category as product_category'  // Fetch product category
        )
        ->where('ratings.user_id', $userId) // Filter by logged-in user
        ->orderBy('ratings.created_at', 'desc')
        ->get();

    // Fetch reviews on products that belong to the logged-in user (seller)
    $sellerReviews = DB::table('ratings')
        ->join('users', 'ratings.user_id', '=', 'users.id') // Reviewer details
        ->join('products', 'ratings.product_id', '=', 'products.id') // Product details
        ->select(
            'ratings.*',
            'users.name as reviewer_name',
            'users.profile_picture',
            'products.title as product_title',
            'products.type as product_type',  // Fetch product type
            'products.category as product_category'  // Fetch product category
        )
        ->where('products.user_id', $userId) // Filter by seller's products
        ->orderBy('ratings.created_at', 'desc')
        ->get();

    return view('reviews', compact('userReviews', 'sellerReviews'));
}


    public function termscondition()
    {

        return view('termscondition');
    }

    public function testingmail()
    {

        $details = [

            'title' => "zthis is testing mail",
            "message" => "Hello this is message",
        ];
        Mail::to("fa21-bcs-027@students.cuisahiwal.edu.pk")->send(new forgotpassword($details));
        return redirect('/');
    }
}






<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TurnstileController;
use App\Http\Controllers\ContatsController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SellerCrudProducts;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\showCategoryOptions;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;
use Chatify\Http\Controllers\MessagesController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Order;



Route::get('productdetails/{id}', [SellerCrudProducts::class, 'show'])->name('product.view');
Route::get('categories', [SellerCrudProducts::class, 'edit'])->name('edit.products'); 
Route::delete('delete-product/{id}', [SellerCrudProducts::class, 'destroy'])->name('products.delete');
Route::put('updateProduct/{id}', [SellerCrudProducts::class, 'update'])->name('updateProduct');



Route::middleware('auth')->group(function () {
    Route::get('/chat/{receiverId}', [ChatController::class, 'chat'])->name('chat.ajax');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::post('/chat/fetch', [ChatController::class, 'fetchMessages'])->name('chat.fetch');
});
Route::get('/seller/messages', [ChatController::class, 'sellerInbox'])->name('seller.inbox');



Route::get('/select-role', function () {
    return view('select-role');
})->name('selectRole');

Route::post('/save-role', [SocialiteController::class, 'saveRole'])->name('saveRole');
Route::post('/contacts/mark-all-read', [MainController::class, 'markAllAsRead']);
Route::delete('/contacts/clear-all', [MainController::class, 'clearAll']);
Route::get('/contacts/unread', [MainController::class, 'getUnreadContacts']);
Route::get('/sellerRegistrations', [MainController::class, 'registerSeller'])->name('seller.get');
Route::post('/sellerRegister', [MainController::class, 'sellerregister'])->name('seller.register');
Route::get('/verify-email/{token}', [EmailVerificationController::class, 'verifyEmail'])->name('verify.email');
Route::get('/sellerUpdatePassword', [MainController::class, 'sellerUpdatePassword'])->name('seller.updatepassword');
Route::get('/messages/{id}', [MessagesController::class, 'getMessages'])->name('messages.get');
Route::get('/chat/{id}', [MessagesController::class, 'chatWithSeller'])->name('chat.seller');
Route::post('/messages/send', [MessagesController::class, 'sendMessage'])->name('messages.send');
Route::group(['middleware' => ['chatify.auth']], function () {
    Route::get('/chatify/seller/{id}', [MessagesController::class, 'chatWithSeller'])->name('chatify.seller');
});
//Admin
    Route::get('create-blog', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('admin.blog.store');
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{id}/like', [BlogController::class, 'like'])->name('blog.like');
Route::post('/blog/{id}/dislike', [BlogController::class, 'dislike'])->name('blog.dislike');
Route::post('/blog/{id}/comment', [BlogController::class, 'comment'])->name('blog.comment');

Route::get('sales', action: [AdminController::class, 'showProductsWithSales'])->name('admin.Totalsales');
Route::get('Manage-policy', action: [\App\Http\Controllers\Admin\PrivacyPolicyController::class, 'policy'])->name('admin.managepolicy');
Route::get('/admin-privacy-policy-edit', [\App\Http\Controllers\Admin\PrivacyPolicyController::class, 'edit'])->name('privacy.edit');
Route::post('/admin/privacy-policy/update', [\App\Http\Controllers\Admin\PrivacyPolicyController::class, 'update'])->name('privacy.update');
Route::get('sellerRegistrationRequests', [AdminController::class, 'sellerRegistrationRequests'])->name('admin.register');
Route::post('/approve-seller', [AdminController::class, 'approveSeller'])->name('approve.seller');
Route::post('/unapprove-seller', [AdminController::class, 'unapprove'])->name('unapprove.seller');
Route::get('sellerRegistration', [AdminController::class, 'sellersRegistration'])->name('admin.seller');
Route::get('payments', [StripePaymentController::class, 'showPayments'])->name('admin.payments');
Route::post('/contacts/{id}/mark-read', [ContatsController::class, 'markRead'])->name('contact.markRead');
Route::post('/contacts/{id}/mark-unread', [ContatsController::class, 'markUnread'])->name('contact.markUnread');
Route::delete('/contacts/{id}', [ContatsController::class, 'destroy'])->name('contact.delete');
Route::get('/adminContacts', [AdminController::class, 'adminContacts'])->name('getContacts');
Route::get('/adminSubscriptions', [AdminController::class, 'adminSubscriptions'])->name('getNewsletters');
Route::delete('/newsletter/{id}', [NewsLetterController::class, 'destroy'])->name('newsletter.delete');
Route::post('/changeOrderStatus', [MainController::class, 'changeStatus'])->name('changeOrderStatus');
Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.check')
    ->name('admin.dashboard');
    Route::get('/adminprofile', [AdminController::class, 'adminprofile'])->name('adminprofile');
Route::get('/adminOrders', [AdminController::class, 'adminOrders'])->name('adminOrders');
Route::get('/adminproducts', [AdminController::class, 'adminproducts'])->name('adminproducts');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::post('/product/{id}/activate', [ProductController::class, 'activate'])->name('product.activate');
Route::post('/product/{id}/deactivate', [ProductController::class, 'deactivate'])->name('product.deactivate');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user.delete');
Route::post('/user/{id}/activate', [UsersController::class, 'activate'])->name('user.activate');
Route::post('/user/{id}/deactivate', [UsersController::class, 'deactivate'])->name('user.deactivate');
Route::get('/Customers', [AdminController::class, 'Customers'])->name('Customers');
Route::get('customer-details/{id}', [UsersController::class, 'show'])->name('customer.details');


Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('my.orders');

Route::get('/orders/pdf', [MainController::class, 'downloadOrdersPdf'])->name('orders.pdf');
Route::get('/orders', [MainController::class, 'orders'])->name('user.orders');
Route::put('/update-product/{id}', [AddProductController::class, 'update'])->name('product.update');
Route::get('/search', [MainController::class, 'search']);
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');
Route::post('/upload-profile-pic', [ProfileController::class, 'uploadProfilePic'])->name('profile.upload');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/submit-review', [ReviewController::class, 'submitReview'])->name('submit.review');
Route::post('/sellform', [ProductController::class, 'store'])->name('sellform.store')->middleware('auth.check');
Route::post('/categories/addProduct', [AddProductController::class, 'addProduct']);
Route::post('/categories/all', [AddProductController::class, 'AllCategoriesForm']);


    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/about', [MainController::class, 'about']);


Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('addtocart', [CartController::class, 'addtocart'])->name('addToCart');
Route::get('deleteCartItem/{id}', [CartController::class, 'deleteCartItem']);
Route::post('updateCart', [CartController::class, 'updateCart']);
Route::get('clearCart', [CartController::class, 'clearCart'])->name('clearCart');
Route::get('complete-your-order/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('placeOrder', [CheckoutController::class, 'placeOrder']);
Route::get('/addProducts', [AddProductController::class, 'addProducts'])->name('sellform');
Route::get('/company-info', [MainController::class, 'about'])->name('about');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/customers/wishlist_items', [MainController::class, 'wishlist'])->name('wishlist');
// Route for deleting an item from the wishlist
Route::post('/wishlist/delete/{productId}', [WishlistController::class, 'deleteWishlistItem'])->name('wishlist.delete');
Route::post('addToWishlist', [WishlistController::class, 'addToWishlist'])->name('addToWishlist');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/seller/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
Route::get('/faq', [MainController::class, 'faq'])->name('faq');
Route::get('/forgot-password', [MainController::class, 'forgotpassword'])->name('forgotpassword');
Route::get('/auth/login', [UsersController::class, 'login'])->name('login');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::get('/auth/signup', [UsersController::class, 'signup'])->name('signup');
Route::get('/mylisting', [MainController::class, 'mylisting'])->name('mylisting');
Route::get('/privacypolicy', [MainController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/categories/{id?}', [showCategoryOptions::class, 'categories'])->name('categories');
Route::get('/reviews', [MainController::class, 'reviews'])->name('reviews');
Route::get('/termscondition', [MainController::class, 'termscondition'])->name('termscondition');
Route::get('/show-product', [MainController::class, 'showproduct'])->name('show-product');

// Route to show the product details page (with ratings)
Route::get('buyNow/{productId}', [MainController::class, 'buyNow'])->name('buyNow');
Route::get('/product-details/{id}', [MainController::class, 'productdetails'])->name('product-details')->middleware('auth.check');
Route::post('/products/{productId}/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::post('question/submit', [QuestionController::class, 'store'])->name('question.submit');
Route::get('product/{id}/questions', [QuestionController::class, 'show'])->name('question.show');
Route::post('question/{id}/answer', [QuestionController::class, 'answerQuestion'])->name('question.answer');
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');
Route::get('/customers/products', [ProductController::class, 'index'])->name('products.list');
// Form Post Routes
Route::post('/contactform', [ContatsController::class, 'contactform'])->name('contactform.submit');
Route::post('/listing', [MainController::class, 'listing'])->name('listing.submit');
Route::post('newsLetter', [NewsLetterController::class, 'newsLetter'])->name('newsletter.submit');
Route::post('signupUser', [UsersController::class, 'signupUser'])->name('signupUser.submit');
Route::post('loginUser', [UsersController::class, 'loginUser'])->name('loginUser.submit');
Route::post('/product', [AddProductController::class, 'addProduct'])->name('product.add');

// Listings Routes
Route::get('/listings', [MainController::class, 'showListings'])->name('listings');
Route::get('/servicedetails/{id}', [MainController::class, 'showDetails'])->name('servicedetails');

// Socialite Login Routes
Route::get('googleLogin', [SocialiteController::class, 'googleLogin'])->name('googleLogin');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogle'])->name('googleCallback');


Route::get('/stripe-checkout', [StripePaymentController::class, 'stripecheckout'])->name('credit-card');
Route::get('/payment-success', [StripePaymentController::class, 'afterPayment'])->name('payment.success');
Route::get('/all-payments', [StripePaymentController::class, 'showPayments'])->name('all.payments');
Route::get('/order-payments', [StripePaymentController::class, 'showPayments'])->name('order.payments');
Route::get('/transactions', [StripePaymentController::class, 'showPayments'])->name('transactions.list');
Route::get('/stripe-checkout/{order_id}', [StripePaymentController::class, 'stripeCheckout'])
    ->name('stripe.checkout');
Route::get('auth/facebook', [SocialiteController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialiteController::class, 'loginWithFacebook']);
Route::get('/questions', [MainController::class, 'questions'])->name('questions');
Route::post('/answer/store/{question}', [QuestionController::class, 'storeAnswer'])->name('answer.store');
Route::get('/fetch-products', [MainController::class, 'fetchProducts'])->name('fetch.products');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('/api/order-stats', function (Request $request) {
    $timeframe = $request->get('timeframe', 'monthly');
    if ($timeframe == 'today') {
        $orders = Order::whereDate('created_at', today())
            ->selectRaw('HOUR(created_at) as hour, COUNT(id) as total_orders')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get();
        $labels = range(0, 23);
        $data = collect($labels)->map(fn($hour) => $orders->firstWhere('hour', $hour)->total_orders ?? 0);
    } elseif ($timeframe == 'weekly') {
        $orders = Order::whereBetween('created_at', [now()->subWeek(), now()])
            ->selectRaw('DATE(created_at) as date, COUNT(id) as total_orders')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $orders->pluck('date');
        $data = $orders->pluck('total_orders');
    } elseif ($timeframe == 'monthly') {
        $orders = Order::whereBetween('created_at', [now()->subMonth(), now()])
            ->selectRaw('DATE(created_at) as date, COUNT(id) as total_orders')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $labels = $orders->pluck('date');
        $data = $orders->pluck('total_orders');
    } elseif ($timeframe == 'yearly') {
        $orders = Order::whereBetween('created_at', [now()->subYear(), now()])
            ->selectRaw('MONTHNAME(created_at) as month, COUNT(id) as total_orders')
            ->groupBy('month')
            ->orderByRaw('MIN(created_at)')
            ->get();
        $labels = $orders->pluck('month');
        $data = $orders->pluck('total_orders');
    }

    return response()->json([
        'labels' => $labels ?? [],
        'data' => $data ?? [],
        'totalOrders' => $orders->sum('total_orders'),
    ]);
});

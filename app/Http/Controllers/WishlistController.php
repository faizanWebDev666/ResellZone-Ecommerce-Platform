<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function deleteWishlistItem($productId)
    {
        $item = Wishlist::find($productId);
    
        if ($item) {
            $item->delete();
            return redirect()->back()->with('success', 'One item deleted from Wishlist');
        }
    
        return redirect()->back()->with('error', 'Item not found in Wishlist');
    }

    // MainController.php
    public function addToWishlist(Request $request)
{
    if (!session()->has('id')) {
            return redirect('auth/login')->with('error', 'Please Login First');
    }

    $customerId = session()->get('id');
    $productId = $request->input('id');

    $existingItem = Wishlist::where('productId', $productId)
        ->where('customerId', $customerId)
        ->first();

    if ($existingItem) {
        $existingItem->delete();
        return response()->json(['status' => 'removed', 'message' => 'Item removed from wishlist.']);
    }

    $wishlistItem = new Wishlist();
    $wishlistItem->productId = $productId;
    $wishlistItem->customerId = $customerId;
    $wishlistItem->save();

    return response()->json(['status' => 'added', 'message' => 'Item added to wishlist.']);
}


}

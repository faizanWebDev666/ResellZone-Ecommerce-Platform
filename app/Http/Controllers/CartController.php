<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function clearCart()
    {
        $userId = session()->get('id');

        Cart::where('customerId', $userId)->delete();

        return redirect()->back()->with('success', 'All items have been removed from your cart.');
    }

    
    public function cart()
    {
        if (!session()->has('id')) {
            return redirect()->route('login')->with('error', 'Please log in to access your Cart.');
        }
        $cartItems = DB::table('products')
            ->join('carts', 'carts.productId', '=', 'products.Id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.Id')
            ->select(
       'products.title',
                'products.price',
                'carts.quantity',  
                'carts.id',
                'carts.productId',
                'carts.customerId',
                'carts.created_at',
                DB::raw('MIN(product_images.product_images) as product_image') // Fetch one image per product
            )
            ->where('carts.customerId', session()->get('id'))
            ->groupBy(
        'carts.id',
                'products.title',
                'products.price',
                'carts.quantity',  
                'carts.productId',
                'carts.customerId',
                'carts.created_at'
            )
            ->get();

        return view('cart', compact('cartItems'));
    }
    public function deleteCartItem($id)
    {
            $item = Cart::find($id);
            $item->delete();
            return redirect()->back()->with('success', 'One Item deleted from Cart');
    }

    public function updateCart(Request $data)
    {
        if (session()->has('id')) {

            $item = Cart::find($data->input('id'));
            $item->quantity = $data->input('quantity');
            $item->save();

            return redirect()->back()->with('success', 'Success! Items Quantity Updated.');
        } else {
            return redirect()->route('login')->with('error', 'Info! Please Login to System.');
        }
    }

    public function addtocart(Request $data)
{
    if (session()->has('id')) {
        $customerId = session()->get('id');
        $productId = $data->input('id');
        $quantity = $data->input('quantity', 1);

        // Check if the product already exists in the cart for the user
        $existingItem = Cart::where('customerId', $customerId)
                            ->where('productId', $productId)
                            ->first();

        if ($existingItem) {
            $existingItem->quantity += $quantity;
            $existingItem->save();

        } else {
            $item = new Cart();
            $item->quantity = $quantity;
            $item->productId = $productId;
            $item->customerId = $customerId;
            $item->save();
        }

        $cartCount = Cart::where('customerId', $customerId)->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => 'Item added to cart!',
            'cartCount' => $cartCount
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Please log in to add items to the cart.'
        ]);
    }
}


}

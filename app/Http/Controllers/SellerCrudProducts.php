<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellerCrudProducts extends Controller
{
    // View Product
public function show($id) {
    $product = Product::findOrFail($id);
    return view('product.details', compact('product'));
}

// Edit Product
public function edit(Request $request) {
    $product = Product::findOrFail($request->product_id);
    return view('Sellereditproduct', compact('product'));
}

// Delete Product
public function destroy($id) {
    Product::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Product deleted successfully!');
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'category' => 'required|string',
        'location' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
    ]);

    $product = Product::findOrFail($id);

    $product->title = $request->title;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category = $request->category;
    $product->location = $request->location;
    $product->city = $request->city;
    $product->phone_number = $request->phone_number;

    $product->save();
    return redirect()->route('dashboard')->with('success', 'Product updated successfully!');
}


}

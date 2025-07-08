<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function edit($id)
{
    $product = Product::findOrFail($id); // Fetch product from DB
    return view('addProducts', compact('product')); // Send product data to sellForm
}

    public function show(Request $request)
    {


        
        $query = Product::query();

        // Apply filters
        if ($request->filled('query')) {
            $query->where('name', 'LIKE', '%' . $request->query . '%')
                  ->orWhere('description', 'LIKE', '%' . $request->query . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        if ($request->filled('region')) {
            $query->where('region', $request->region);
        }

        // Fetch products with applied filters
        $products = $query->paginate(10);

        return view('showproduct', compact('products'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    // ACTIVATE PRODUCT
    public function activate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'active';
        $product->save();
        return redirect()->back()->with('success', 'Product activated successfully.');
    }

    // DEACTIVATE PRODUCT
    public function deactivate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'inactive';
        $product->save();
        return redirect()->back()->with('success', 'Product deactivated successfully.');
    }
}

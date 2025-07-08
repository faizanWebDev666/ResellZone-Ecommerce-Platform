<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RatingController extends Controller
{
    public function store(Request $request, $productId)
    {
        // Validate the incoming data
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string|max:500',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if the user has already reviewed this product
        $hasReviewed = Rating::where('user_id', $request->user_id)
            ->where('product_id', $productId)
            ->exists();

        if ($hasReviewed) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this product.'
            ], 403);
        }

        // Check if the user has an order with this product and its status is 'delivered'
        $hasPurchased = Order::where('customerId', (int)$request->user_id)
            ->whereRaw("LOWER(status) = 'delivered'")
            ->whereHas('orderItems', function ($query) use ($productId) {
                $query->where('productId', $productId);
            })
            ->exists();

        // Log for debugging
        Log::info("User has reviewed: " . ($hasReviewed ? 'Yes' : 'No') . " | Order exists: " . ($hasPurchased ? 'Yes' : 'No') . " for user: " . $request->user_id);

        if (!$hasPurchased) {
            return response()->json([
                'success' => false,
                'message' => 'You can only review products you have purchased and received.'
            ], 403);
        }

        // Create a new rating and review
        $rating = new Rating();
        $rating->user_id = $request->user_id;
        $rating->product_id = $productId;
        $rating->rating = $request->rating;
        $rating->review = $request->review;

        if ($rating->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Your review has been submitted successfully!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'There was an issue saving your review. Please try again.'
            ]);
        }
    }
}

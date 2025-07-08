<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'question' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        // Create a new Question instance
        $question = new Questions();
        $question->user_id = $request->user_id;
        $question->product_id = $request->product_id;
        $question->question = $request->question;

        // Save the question to the database
        if ($question->save()) {
            return response()->json([
                'success' => true,
                'user_name' => $question->user->name, // Get user name
                'question' => $question->question,
            ]);
        } else {
            return response()->json(['success' => false], 500);
        }
    }

    // Method to display questions for a product
    public function show($id)
    {
        $product = Product::with('questions.user')->findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function storeAnswer(Request $request, $questionId)
    {
        $request->validate([
            'answer' => 'required|string|min:3',
        ]);

        $question = Questions::findOrFail($questionId);
        $question->answer = $request->input('answer');
        $question->save();

        return response()->json(['success' => true, 'message' => 'Answer submitted successfully!']);
    }



}
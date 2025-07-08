<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     public function chat($receiverId)
    {
        $receiver = User::findOrFail($receiverId);
        return view('chat.ajax', compact('receiver'));
    }

    public function fetchMessages(Request $request)
    {
        $messages = Message::where(function ($q) use ($request) {
            $q->where('sender_id', auth()->id())->where('receiver_id', $request->receiver_id);
        })->orWhere(function ($q) use ($request) {
            $q->where('sender_id', $request->receiver_id)->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000'
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return response()->json($message);
    }
    public function sellerInbox()
{
    $userId = session('id');

    // Get distinct senders who messaged the seller
    $conversations = Message::where('receiver_id', $userId)
        ->orWhere('sender_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function ($message) use ($userId) {
            return $message->sender_id == $userId ? $message->receiver_id : $message->sender_id;
        });

    return view('chat.seller-inbox', compact('conversations'));
}

}


<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // Send a message
    public function sendMessage(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            'message' => 'required|string',
        ]);

        $message = Message::create($request->only('sender_id', 'receiver_id', 'message'));

        return response()->json(['message' => 'Message sent!', 'data' => $message], 200);
    }

    // Get messages for a specific user
    public function getMessages($userId)
    {
        return response()->json(['messages' => 'hello'], 200);
        $messages = Message::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['messages' => $messages], 200);
    }
}

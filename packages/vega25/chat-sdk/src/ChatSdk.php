<?php

namespace ChatSdk;

use Illuminate\Support\Facades\Http;

class ChatService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('CHAT_SERVICE_URL', 'http://127.0.0.1:8000/api');
    }

    public function sendMessage($senderId, $receiverId, $message)
    {
        return Http::post("{$this->baseUrl}/messages", compact('senderId', 'receiverId', 'message'))->json();
    }

    public function getMessages($userId)
    {
        return Http::get("{$this->baseUrl}/messages/{$userId}")->json();
    }
}

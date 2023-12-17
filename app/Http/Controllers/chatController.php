<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageEvent;

class chatController extends Controller
{
    public function loadChatView()
    {
        return view('chat_view');
    }

    public function broadcast_message(Request $request)
    {
        event(new MessageEvent($request->username,$request->message));
        
    }
}

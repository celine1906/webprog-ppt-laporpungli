<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $users = User::all();
            return view('admin.chat.index', compact('users'));
        } else {
            return view('masyarakat.chat');
        }
    }

    public function show(User $user)
{
    if (auth()->user()->isAdmin()) {
        $messages = Message::where('user_id', $user->id)->get();
        return view('admin.chat.show', compact('user', 'messages'));
    } else {
        $messages = Message::where('user_id', $user->id)->get();
        return view('masyarakat.chat.show', compact('user', 'messages'));
    }
}



public function send(Request $request, User $user)
{
    Log::info('Sending message for user:', ['user' => $user]);

    $request->validate([
        'message' => 'required|string',
    ]);

    if (!$user) {
        Log::error('User not found.');
        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }

    Message::create([
        'user_id' => $user->id,
        'sender_id' => auth()->id(),
        'content' => $request->message,
    ]);

    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.chat.show', ['user' => $user->id]);
    } else {
        return redirect()->route('masyarakat.chat.show', ['user' => $user->id]);
    }
}


}

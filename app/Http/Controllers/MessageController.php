<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function contactUs()
    {
        $user = Auth::user(); 
        return view('contactus', compact('user'));
    }
    public function index()
    {
        $messages = Message::all(); 
        return view('admin.usermessages', compact('messages'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'message' => 'required|string',
        ]);
        
        Message::create([
            'full_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'message' => $request->input('message'),
        ]);
        
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        $message = Message::find($id);
        if ($message) {
            $message->delete();
        }
        
        return redirect()->route('view.messages');
    }
}

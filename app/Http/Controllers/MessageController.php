<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function index()
    {
        $messages = Message::all(); // Mengambil semua data produk dari database
        return view('admin.usermessages', compact('messages')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        Message::create([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        return redirect('/')->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        // Hapus pesan berdasarkan ID
        $message = Message::find($id);
        if ($message) {
            $message->delete();
        }

        // Kembali ke halaman sebelumnya
        return redirect()->route('messages.index');
    }
}

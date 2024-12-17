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
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('contactus', compact('user'));
    }
    public function index()
    {
        $messages = Message::all(); // Mengambil semua data produk dari database
        return view('admin.usermessages', compact('messages'));
    }

    public function store(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Validasi input pesan
        $request->validate([
            'message' => 'required|string',
        ]);

        // Simpan Data
        Message::create([
            'full_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'message' => $request->input('message'),
        ]);

        // return redirect('/')->with('success', 'Your message has been sent successfully!');
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        // Hapus pesan berdasarkan ID
        $message = Message::find($id);
        if ($message) {
            $message->delete();
        }

        // Kembali ke halaman sebelumnya
        return redirect()->route('view.messages');
    }
}

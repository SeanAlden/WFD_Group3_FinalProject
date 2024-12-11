<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $path = $request->file('profile_image')->store('profile_images', 'public');

    //     $user = auth()->Guard::user();
    //     $user->profile_image = $path;
    //     $user->save();

    //     return redirect()->back()->with('status', 'profile-updated');
    // }
    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('profile_images', 'public');

            // Delete the old profile image if exists
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }

            // Update the user's profile image in the database
            $user->profile_image = $imagePath;
            $user->user::save();
        }

        return back()->with('status', 'Profile image updated successfully!');
    }
}

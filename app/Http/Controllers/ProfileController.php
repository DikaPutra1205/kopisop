<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.index', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        $imageName = time() . '.' . $request->file('profile_picture')->extension();
        $uploadedImage = $request->file('profile_picture')->move(public_path('profile_pictures'), $imageName);
        $imagePath = 'profile_pictures/' . $imageName;
        $oldImagePath = $user->profile_picture;

        if ($request->hasFile('profile_pictures') && $oldImagePath && file_exists(public_path($oldImagePath))) {
            unlink(public_path($oldImagePath));
        }

        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->profile_picture = $imagePath;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeEmail; // Import your Mailable
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // Import Mail Facade

class RegisterController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('auth.register');
    }

    // Handle the registration logic
    public function store(Request $request)
    {
        // 1. Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Send the Welcome Email
        // This is where we use the Mailable class we created earlier
        Mail::to($user->email)->send(new WelcomeEmail($user));

        // 4. Login and Redirect
        auth()->login($user);

        return redirect('/')->with('success', 'Account created and email sent!');
    }
}
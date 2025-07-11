<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller {
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'email'    => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attributes)) {
            // Authentication passed...
            // return redirect('/jobs');
            throw ValidationException::withMessages([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        request()->session()->regenerate();

        return redirect('/jobs')->with('success', 'You are logged in successfully.');
    }

    public function destroy()
    {
        // Logic to log out the user
        // For example, using Auth::logout();
        // return redirect('/login');
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}

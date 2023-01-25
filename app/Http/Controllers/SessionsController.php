<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    // Create Session
    public function create()
    {
        return view('sessions.create');
    }

    // Store the authenticated user in session
    public function store()
    {
        // validate the reuqest
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (auth()->attempt($attributes)) {
            // redirect with a success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }

        // auth failed
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);

    }

    // Destroy Session
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'đenja');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Register Create
    public function create()
    {
        return view('register.create');
    }

    // Create user and store in the database
    public function store()
    {
        // Store values in variable after validating the inputs
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'required|min:12|max:255'
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        // Create user in the database
        $user = User::create($attributes);

        // Log the user in
        auth()->login($user);

        // Redirect back to startpage
        return redirect('/')->with('success', 'Your account has been created');


    }
}

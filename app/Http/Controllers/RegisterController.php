<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() 
    {
        return view('register.create');
    }

    public function store() 
    {
        // create the new user

        $attributes = request()->validate([
            'name' => 'required|max:255',
            // 'username' => 'required|max:255|min:3',  
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],  
            'email' => 'required|email|max:255|unique:users,email', 
            'password' => ['required', 'min:7', 'max:255']
        ]);

        $user = User::create($attributes);

        auth()->login($user);
        
        return redirect('/')->with('success', 'Your account has been created.');
    }
}

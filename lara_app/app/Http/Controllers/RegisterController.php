<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        if ($validatedData['password'] !== '') {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }


        User::create($validatedData);
        return redirect()->to('/login')->with(['message' => 'User registered successfully']);
    }
}

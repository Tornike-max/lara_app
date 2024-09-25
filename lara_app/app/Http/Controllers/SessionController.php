<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        if (!Auth::attempt($validatedData)) {
            throw ValidationException::withMessages([
                'error' => 'Sorry, those credentials do not match'
            ]);
        };

        $request->session()->regenerate();

        return redirect()->to('/jobs');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->to('/login');
    }
}

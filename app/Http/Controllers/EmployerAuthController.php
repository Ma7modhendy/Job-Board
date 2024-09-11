<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use Hash;

class EmployerAuthController extends Controller
{
    // Show employer login form
    public function showLoginForm()
    {
        return view('employers.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('employer')->attempt($credentials)) {
            // return redirect()->intended('/home/employers');
            return redirect()->route('employers.dashboard');

        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    // Show employer registration form
    public function showRegistrationForm()
    {
        return view('employers.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $employer = Employer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('employer')->login($employer);

        return redirect()->route('employers.dashboard');
    }

    // Handle logout
    public function logout()
    {
        Auth::guard('employer')->logout();
        return redirect('/employers/login');
    }
}


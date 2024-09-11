<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         return redirect()->intended('admin/dashboard');
    //     }

    //     if (Auth::guard('admin')->attempt([
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ])) {
    //         return redirect()->route('admin.dashboard');
    //     }

    //     return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    // }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}


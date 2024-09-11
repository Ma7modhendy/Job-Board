<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('candidates.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('candidates')->attempt($credentials)) {
            return redirect()->intended('/candidates/search-jobs');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegisterForm()
    {
        return view('candidates.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Candidate::create($data);

        return redirect('/candidates/search-jobs');
    }

    public function logout()
    {
        Auth::guard('candidates')->logout();
        return redirect('/home/candidates/login');
    }
}


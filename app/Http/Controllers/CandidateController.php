<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function create()
    {
        return view('candidates.register'); // Assuming you have a view file named 'register.blade.php' in the 'candidates' directory
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $candidate = new Candidate();
        $candidate->name = $validatedData['name'];
        $candidate->email = $validatedData['email'];
        $candidate->password = bcrypt($validatedData['password']);
        $candidate->save();

        return redirect()->route('candidate.dashboard')->with('success', 'Registration successful!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobListing; // Import the JobListing model
use App\Models\Employer;   // Import the Employer model
use App\Models\Candidate;  // Import the Candidate model (if applicable)
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Your dashboard logic
        return view('admin.dashboard');
    }
    public function index()
    {
        // Fetch data for the dashboard
        $jobListingsCount = JobListing::count();
        $employersCount = Employer::count();
        $candidatesCount = Candidate::count(); // If applicable

        return view('admin.dashboard', compact('jobListingsCount', 'employersCount', 'candidatesCount'));
    }
    public function manageJobListings()
{
    $jobListings = JobListing::all(); // Or paginate if there are many records
    return view('admin.manage-job-listings', compact('jobListings'));
}

public function manageEmployers()
{
    $employers = Employer::all(); // Or paginate if there are many records
    return view('admin.manage-employers', compact('employers'));
}

public function manageCandidates()
{
    $candidates = Candidate::all(); // Or paginate if there are many records
    return view('admin.manage-candidates', compact('candidates'));
}
public function viewJobListing($id)
{
    $jobListing = JobListing::findOrFail($id);
    return view('admin.view-job-listing', compact('jobListing'));
}

public function editJobListing($id)
{
    $jobListing = JobListing::findOrFail($id);
    return view('admin.edit-job-listing', compact('jobListing'));
}



public function deleteJobListing($id)
{
    $jobListing = JobListing::findOrFail($id);
    $jobListing->delete();
    return redirect()->route('admin.job-listings')->with('success', 'Job listing deleted successfully!');
}

public function viewEmployer($id)
{
    $employer = Employer::findOrFail($id); // Assuming the model is named Employer
    return view('admin.view-employer', compact('employer'));
}
public function viewCandidate($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('admin.view-candidate', compact('candidate'));
    }


// Repeat similar methods for Employers and Candidates


}



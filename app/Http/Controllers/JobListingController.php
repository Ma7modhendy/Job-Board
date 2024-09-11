<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search job listings based on title, description, location, and skills
        $jobListings = JobListing::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('location', 'like', '%' . $query . '%')
            ->orWhere('skills', 'like', '%' . $query . '%')
            ->get();

        return view('jobs.search-results', compact('jobListings'));
    }
    public function show($id)
    {
        // Retrieve the job listing by its ID
        $jobListing = JobListing::findOrFail($id);

        // Pass the job listing to the view
        return view('jobs.showo', compact('jobListing'));
    }
    public function apply($id)
    {
        // Retrieve the job listing by its ID
        $jobListing = JobListing::findOrFail($id);

        // Return the view to apply for the job
        return view('jobs.apply', compact('jobListing'));
    }
    public function submitApplication(Request $request)
{
    // Validate the request
    $request->validate([
        'job_listing_id' => 'required|exists:job_listings,id',
        'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // Validate resume file
    ]);

    // Handle the file upload
    $resumePath = $request->file('resume')->store('resumes');

    // Save application (or perform any further processing)
    // Application::create([
    //     'job_listing_id' => $request->input('job_listing_id'),
    //     'resume' => $resumePath,
    //     // Add other application fields as needed
    // ]);

    // Redirect or return a response
    return redirect()->route('home')->with('success', 'Application submitted successfully!');
}

}

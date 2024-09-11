<?php
namespace App\Http\Controllers;

use App\Models\JobListing;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch featured jobs (you can customize the query as needed)
        $featuredJobs = JobListing::take(5)->get(); // Example: Fetch the latest 5 job listings

        // Pass the featured jobs to the view
        return view('home', compact('featuredJobs'));
    }
}

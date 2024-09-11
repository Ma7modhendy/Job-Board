<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\JobListing;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.employer-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $employer = new Employer;
        $employer->name = $request->name;
        $employer->email = $request->email;
        $employer->password = Hash::make($request->password);
        $employer->save();

        Auth::login($employer);

        return redirect('/');
    }
    public function showPostJobForm()
    {
        return view('employers.post-job');
    }

    public function postJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|string',
            'salary_range' => 'required|string',
            'location' => 'required|string',
            'work_type' => 'required|string',
            'application_deadline' => 'required|date',
        ]);
        $employerId = Auth::guard('employer')->id();
        if (!$employerId) {
            return redirect()->back()->withErrors(['error' => 'You must be logged in to post a job.']);
        }
        JobListing::create([
            'title' => $request->title,
            'description' => $request->description,
            'skills' => $request->skills,
            'salary_range' => $request->salary_range,
            'location' => $request->location,
            'work_type' => $request->work_type,
            'application_deadline' => $request->application_deadline,
            'employer_id' => $employerId, // Set the employer_id here
        ]);

        // $jobListing = new JobListing;
        // $jobListing->title = $request->title;
        // $jobListing->description = $request->description;
        // $jobListing->skills = $request->skills;
        // $jobListing->salary_range = $request->salary_range;
        // $jobListing->location = $request->location;
        // $jobListing->work_type = $request->work_type;
        // $jobListing->application_deadline = $request->application_deadline;
        // $jobListing->employer_id = Auth::id();
        // $jobListing->save();

        return redirect()->route('employers.post-job')->with('success', 'Job posted successfully!');
    }
//     public function manageJobListings()
//     {
//         // Get the authenticated employer's ID
//         $employerId = Auth::guard('employer')->id();

//         // Fetch only the job listings associated with the authenticated employer
//         $jobListings = JobListing::where('employer_id', $employerId)->get();

//         return view('employers.manage-job-listings', compact('jobListings'));
//     }

//     public function editJobListing($id)
//     {
//         $jobListing = JobListing::where('id', $id)
//             ->where('employer_id', Auth::guard('employer')->id())
//             ->firstOrFail();

//         return view('employers.edit-job-listing', compact('jobListing'));
//     }

//     public function deleteJobListing($id)
//     {
//         $jobListing = JobListing::where('id', $id)
//             ->where('employer_id', Auth::guard('employer')->id())
//             ->firstOrFail();

//         $jobListing->delete();

//         return redirect()->route('employers.manage-jobs')->with('success', 'Job listing deleted successfully!');
//     }
//     public function updateJobListing(Request $request, $id)
// {
//     $jobListing = JobListing::where('id', $id)
//         ->where('employer_id', Auth::guard('employer')->id())
//         ->firstOrFail();

//     $request->validate([
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'location' => 'required|string',
//     ]);

//     $jobListing->update([
//         'title' => $request->title,
//         'description' => $request->description,
//         'location' => $request->location,
//     ]);

//     return redirect()->route('employers.manage-jobs')->with('success', 'Job listing updated successfully!');
// }
public function manageJobListings()
{
    $jobListings = JobListing::all(); // Or paginate if there are many records
    return view('employers.manage-job-listings', compact('jobListings'));
}
public function viewJobListing($id)
{
    $jobListing = JobListing::findOrFail($id);
    return view('employers.view-job-listing', compact('jobListing'));
}

public function editJobListing($id)
{
    $jobListing = JobListing::findOrFail($id);
    return view('employers.edit-job-listing', compact('jobListing'));
}



public function deleteJobListing($id)
{
    $jobListing = JobListing::findOrFail($id);
    $jobListing->delete();
    return redirect()->route('employers.job-listings')->with('success', 'Job listing deleted successfully!');
}

}


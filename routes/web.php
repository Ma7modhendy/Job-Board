<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployerAuthController;
use App\Http\Controllers\CandidateAuthController;
use App\Http\Controllers\AdminAuthController;




Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('jobs/{id}', [JobListingController::class, 'show'])->name('jobs.show');
Route::get('jobs/apply/{id}', [JobListingController::class, 'apply'])->name('jobs.apply');
Route::post('jobs/submit-application', [JobListingController::class, 'submitApplication'])->name('jobs.submitApplication');


// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);



Route::get('employers/login', [EmployerAuthController::class, 'showLoginForm'])->name('employers.login');
Route::post('employers/login', [EmployerAuthController::class, 'login']);
Route::get('employers/register', [EmployerAuthController::class, 'showRegistrationForm'])->name('employers.register');
Route::post('employers/register', [EmployerAuthController::class, 'register']);
Route::post('employers/logout', [EmployerAuthController::class, 'logout'])->name('employers.logout');

Route::get('employers/dashboard', function () {
    return view('employers.dashboard');
})->middleware('auth:employer')->name('employers.dashboard');



Route::get('employers/job-listings', [EmployerController::class, 'manageJobListings'])->name('employers.job-listings');
Route::get('employers/job-listings/{id}', [EmployerController::class, 'viewJobListing']);
Route::get('employers/job-listings/{id}/edit', [EmployerController::class, 'editJobListing']);
Route::delete('employers/job-listings/{id}', [EmployerController::class, 'deleteJobListing']);



Route::get('job-listings', [AdminController::class, 'manageJobListings'])->name('admin.job-listings');


Route::prefix('employers')->group(function () {

    Route::get('post-job', [EmployerController::class, 'showPostJobForm'])->name('employers.post-job');

// Handle the form submission (POST request)
    Route::post('post-job', [EmployerController::class, 'postJob']);

    Route::get('manage-jobs', [JobListingController::class, 'index']);

    Route::post('respond-application', [ApplicationController::class, 'update']);
});
Route::get('jobs/search', [JobListingController::class, 'search'])->name('jobs.search');
Route::get('jobs/{id}', [JobListingController::class, 'show']);
Route::get('jobs/{id}', [JobListingController::class, 'show'])->name('jobs.showo');




Route::get('candidates/login', [CandidateAuthController::class, 'showLoginForm'])->name('candidate.login');
Route::post('candidates/login', [CandidateAuthController::class, 'login']);

Route::get('candidates/register', [CandidateAuthController::class, 'showRegisterForm'])->name('candidate.register');
Route::post('candidates/register', [CandidateAuthController::class, 'register']);

Route::post('/candidates/logout', [CandidateAuthController::class, 'logout'])->name('candidate.logout');

Route::prefix('candidates')->group(function () {

    Route::get('search-jobs', [JobListingController::class, 'search']);
    Route::post('apply-job', [ApplicationController::class, 'store']);
    Route::get('manage-applications', [ApplicationController::class, 'index']);
});



Route::get('admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('admin/register', [AdminAuthController::class, 'register']);
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->group(function () {
    // Admin Dashboard Route
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Admin Management Routes
Route::get('job-listings', [AdminController::class, 'manageJobListings'])->name('admin.job-listings');
Route::get('employers', [AdminController::class, 'manageEmployers'])->name('admin.employers');
Route::get('acandidates', [AdminController::class, 'manageCandidates'])->name('admin.candidates');
// Job Listings Routes
Route::get('job-listings', [AdminController::class, 'manageJobListings'])->name('admin.job-listings');
Route::get('job-listings/{id}', [AdminController::class, 'viewJobListing']);
Route::get('job-listings/{id}/edit', [AdminController::class, 'editJobListing']);
Route::delete('job-listings/{id}', [AdminController::class, 'deleteJobListing']);

// Employers Routes
Route::get('employers', [AdminController::class, 'manageEmployers'])->name('admin.employers');
Route::get('employers/{id}', [AdminController::class, 'viewEmployer']);
Route::get('employers/{id}/edit', [AdminController::class, 'editEmployer']);
Route::delete('employers/{id}', [AdminController::class, 'deleteEmployer']);




// Candidates Routes
Route::get('candidates', [AdminController::class, 'manageCandidates'])->name('admin.candidates');


Route::get('candidates/{id}', [AdminController::class, 'viewCandidate']);
Route::get('candidates/{id}/edit', [AdminController::class, 'editCandidate']);
Route::delete('candidates/{id}', [AdminController::class, 'deleteCandidate']);



    Route::get('approve-job/{id}', [AdminController::class, 'approveJob']);
    Route::get('reject-job/{id}', [AdminController::class, 'rejectJob']);
    Route::get('monitor', [AdminController::class, 'index']);
});


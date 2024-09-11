<!DOCTYPE html>
<html>
<head>
    <title>View Job Listing</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Job Listing Details</h1>

        <!-- Job Details -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $jobListing->title }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $jobListing->description }}</p>
                <p class="card-text"><strong>Skills:</strong> {{ $jobListing->skills }}</p>
                <p class="card-text"><strong>Salary Range:</strong> {{ $jobListing->salary_range }}</p>
                <p class="card-text"><strong>Location:</strong> {{ $jobListing->location }}</p>
                <p class="card-text"><strong>Work Type:</strong> {{ $jobListing->work_type }}</p>
                <p class="card-text"><strong>Application Deadline:</strong> {{ $jobListing->application_deadline }}</p>
            </div>
        </div>

        <a href="{{ route('employers.job-listings') }}" class="btn btn-secondary mt-3">Back to Job Listings</a>
    </div>
</body>
</html>

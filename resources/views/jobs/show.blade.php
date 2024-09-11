<!DOCTYPE html>
<html>
<head>
    <title>Job Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">{{ $jobListing->title }}</h1>

        <p><strong>Description:</strong> {{ $jobListing->description }}</p>
        <p><strong>Location:</strong> {{ $jobListing->location }}</p>
        <p><strong>Salary Range:</strong> {{ $jobListing->salary_range }}</p>
        <p><strong>Skills:</strong> {{ $jobListing->skills }}</p>
        <p><strong>Work Type:</strong> {{ $jobListing->work_type }}</p>
        <p><strong>Application Deadline:</strong> {{ $jobListing->application_deadline }}</p>

        <a href="{{ url('jobs/apply/' . $jobListing->id) }}" class="btn btn-primary">Apply Now</a>
        <a href="{{ url('jobs') }}" class="btn btn-secondary">Back to Job Listings</a>
    </div>
</body>
</html>

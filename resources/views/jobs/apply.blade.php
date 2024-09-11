<!DOCTYPE html>
<html>
<head>
    <title>Apply for {{ $jobListing->title }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Apply for {{ $jobListing->title }}</h1>

        <p><strong>Description:</strong> {{ $jobListing->description }}</p>
        <p><strong>Location:</strong> {{ $jobListing->location }}</p>
        <p><strong>Salary Range:</strong> {{ $jobListing->salary_range }}</p>

        <form action="{{ url('jobs/submit-application') }}" method="POST">
            @csrf
            <input type="hidden" name="job_listing_id" value="{{ $jobListing->id }}">
            <div class="form-group">
                <label for="resume">Upload Your Resume:</label>
                <input type="file" class="form-control-file" id="resume" name="resume" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>
</html>

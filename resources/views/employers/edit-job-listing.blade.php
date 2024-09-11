<!DOCTYPE html>
<html>
<head>
    <title>Edit Job Listing</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Edit Job Listing</h1>

        <!-- Edit Job Form -->
        <form action="{{ url('employers/job-listings/' . $jobListing->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $jobListing->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $jobListing->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="skills">Required Skills</label>
                <input type="text" class="form-control" id="skills" name="skills" value="{{ $jobListing->skills }}" required>
            </div>

            <div class="form-group">
                <label for="salary_range">Salary Range</label>
                <input type="text" class="form-control" id="salary_range" name="salary_range" value="{{ $jobListing->salary_range }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $jobListing->location }}" required>
            </div>

            <div class="form-group">
                <label for="work_type">Work Type</label>
                <select class="form-control" id="work_type" name="work_type">
                    <option value="remote" {{ $jobListing->work_type == 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="on-site" {{ $jobListing->work_type == 'on-site' ? 'selected' : '' }}>On-site</option>
                    <option value="hybrid" {{ $jobListing->work_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
            </div>

            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ $jobListing->application_deadline }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Job Listing</button>
            <a href="{{ route('employers.job-listings') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>

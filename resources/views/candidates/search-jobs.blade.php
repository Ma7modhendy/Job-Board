<!DOCTYPE html>
<html>
<head>
    <title>Search Jobs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Search Jobs</h1>
        <form method="GET" action="{{ url('candidates/search-jobs') }}">
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" class="form-control" id="keywords" name="keywords">
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category">
            </div>
            <div class="form-group">
                <label for="experience_level">Experience Level</label>
                <select class="form-control" id="experience_level" name="experience_level">
                    <option value="">Any</option>
                    <option value="entry">Entry Level</option>
                    <option value="mid">Mid Level</option>
                    <option value="senior">Senior Level</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary_range">Salary Range</label>
                <input type="text" class="form-control" id="salary_range" name="salary_range">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Example of Job Listings -->
        <h2 class="my-4">Job Listings</h2>
        <div class="list-group">
            @foreach ($jobs as $job)
                <a href="{{ url('candidates/apply-job/' . $job->id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $job->title }}</h5>
                    <p class="mb-1">{{ $job->description }}</p>
                    <small>{{ $job->location }} | {{ $job->salary_range }}</small>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>

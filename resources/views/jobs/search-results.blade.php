<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Search Results</h1>

        @if($jobListings->isEmpty())
            <div class="alert alert-info">
                No job listings found matching your search.
            </div>
        @else
            <div class="list-group">
                @foreach($jobListings as $jobListing)
                    <a href="{{ url('jobs/' . $jobListing->id) }}" class="list-group-item list-group-item-action">
                        <h5 class="mb-1">{{ $jobListing->title }}</h5>
                        <p class="mb-1">{{ $jobListing->description }}</p>
                        <small>{{ $jobListing->location }} | {{ $jobListing->salary_range }}</small>
                    </a>
                @endforeach
            </div>
        @endif

        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Back to Home</a>
    </div>
</body>
</html>

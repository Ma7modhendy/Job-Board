<!DOCTYPE html>
<html>
<head>
    <title>Job Board Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="my-5 text-center">
            <h1>Welcome to the Job Board</h1>
            <p>Your one-stop platform to find jobs, post jobs, and manage your career.</p>
        </header>

        <!-- Main Buttons Section -->
        <div class="row text-center my-4">
            <div class="col-md-4">
                <a href="{{ url('admin/login') }}" class="btn btn-primary btn-lg">Admin </a>
                {{-- <a href="{{ url('admin/dashboard') }}" class="btn btn-primary btn-lg">Admin Dashboard</a> --}}
            </div>
            <div class="col-md-4">
                <a href="{{ url('employers/register') }}" class="btn btn-success btn-lg">Employer </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('candidates/register') }}" class="btn btn-info btn-lg">Candidate </a>
            </div>
        </div>

        <!-- Search Jobs Section -->
        <div class="my-5">
            <h2 class="text-center">Search for Jobs</h2>
            <form action="{{ route('jobs.search') }}" method="GET" class="my-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder="Search jobs by title, skills, or location..." required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Featured Jobs Section -->
        <div class="my-5">
            <h2 class="text-center">Featured Jobs</h2>
            <div class="row">
                @if(isset($featuredJobs) && $featuredJobs->isNotEmpty())
                    @foreach($featuredJobs as $job)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $job->title }}</h5>
                                <p class="card-text">{{ Str::limit($job->description, 100) }}</p>
                                <a href="{{ url('jobs/' . $job->id) }}" class="btn btn-primary">View Job</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="text-center">No featured jobs available at the moment.</p>
                @endif
            </div>
        </div>

        <!-- How It Works Section -->
        {{-- <div class="my-5">
            <h2 class="text-center">How It Works</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h4>1. Register</h4>
                    <p>Create an account as an employer or a candidate.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h4>2. Post or Apply</h4>
                    <p>Employers post job listings, and candidates apply for jobs.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h4>3. Manage</h4>
                    <p>Manage your listings and applications from your dashboard.</p>
                </div>
            </div>
        </div> --}}

        <!-- Footer Section -->
        <footer class="my-5 text-center">
            <p>&copy; 2024 Job Board. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>

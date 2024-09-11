<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Admin Dashboard</h1>

        <!-- Dashboard Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Job Listings</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $jobListingsCount }}</h5>
                        <p class="card-text">Total number of job listings.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Employers</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $employersCount }}</h5>
                        <p class="card-text">Total number of employers registered.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Candidates</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $candidatesCount }}</h5>
                        <p class="card-text">Total number of candidates registered.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Controls and Information -->
        <div class="mt-4">
            <h4>Actions</h4>
            <a href="{{ url('admin/job-listings') }}" class="btn btn-primary">Manage Job Listings</a>
            <a href="{{ url('admin/employers') }}" class="btn btn-secondary">Manage Employers</a>
            <a href="{{ url('admin/candidates') }}" class="btn btn-info">Manage Candidates</a>
        </div>
    </div>
</body>
</html>

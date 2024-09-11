<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Admin Dashboard</h1>
        <div class="list-group">
            <h4 class="list-group-item list-group-item-action active">Pending Job Posts</h4>
            @foreach ($pendingJobs as $job)
                <a href="{{ url('admin/approve-job/' . $job->id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $job->title }}</h5>
                    <p class="mb-1">{{ $job->description }}</p>
                    <small>{{ $job->location }} | {{ $job->salary_range }}</small>
                </a>
            @endforeach
        </div>
    </div>
</body>
</html>

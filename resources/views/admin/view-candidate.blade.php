<!DOCTYPE html>
<html>
<head>
    <title>View Candidate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Candidate Details</h1>

        <!-- Candidate Details -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $candidate->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $candidate->email }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $candidate->phone }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $candidate->address }}</p>
                <!-- Add any other candidate-specific fields here -->
            </div>
        </div>

        <a href="{{ route('admin.candidates') }}" class="btn btn-secondary mt-3">Back to Candidates</a>
    </div>
</body>
</html>

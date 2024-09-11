<!DOCTYPE html>
<html>
<head>
    <title>View Employer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Employer Details</h1>

        <!-- Employer Details -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $employer->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $employer->email }}</p>
                <p class="card-text"><strong>Company:</strong> {{ $employer->company_name }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $employer->phone }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $employer->address }}</p>
            </div>
        </div>

        <a href="{{ route('admin.employers') }}" class="btn btn-secondary mt-3">Back to Employers</a>
    </div>
</body>
</html>

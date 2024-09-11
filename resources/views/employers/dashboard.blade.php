<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Employer Dashboard</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="d-grid gap-3">
                    <a href="{{ route('employers.post-job') }}" class="btn btn-primary btn-lg">Post Job</a>
                    {{-- <a  class="btn btn-secondary btn-lg">Edit and Manage Jobs</a> --}}
                    <a href="{{ url('employers/job-listings') }}" class="btn btn-secondary btn-lg">Edit and Manage Jobs</a>
                    <a  class="btn btn-warning btn-lg">Review</a>
                    {{-- <a href="{{ route('employers.review') }}" class="btn btn-warning btn-lg">Review</a> --}}
                    <a href="/" class="btn btn-light btn-lg" >Home</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

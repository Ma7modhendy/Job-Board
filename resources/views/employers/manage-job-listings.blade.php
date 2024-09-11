<!DOCTYPE html>
<html>
<head>
    <title>Manage Job Listings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Manage Job Listings</h1>

        <!-- Job Listings Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Salary Range</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobListings as $jobListing)
                    <tr>
                        <td>{{ $jobListing->id }}</td>
                        <td>{{ $jobListing->title }}</td>
                        <td>{{ Str::limit($jobListing->description, 50) }}</td>
                        <td>{{ $jobListing->location }}</td>
                        <td>{{ $jobListing->salary_range }}</td>
                        <td>
                            <a href="{{ url('employers/job-listings/'.$jobListing->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ url('employers/job-listings/'.$jobListing->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('employers/job-listings/'.$jobListing->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

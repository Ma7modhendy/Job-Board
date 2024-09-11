<!DOCTYPE html>
<html>
<head>
    <title>Apply for Job</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Apply for {{ $job->title }}</h1>
        <form method="POST" action="{{ url('candidates/apply-job/' . $job->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="resume">Upload Resume</label>
                <input type="file" class="form-control-file" id="resume" name="resume">
            </div>
            <div class="form-group">
                <label for="contact_info">Contact Information</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info" required>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>
</body>
</html>

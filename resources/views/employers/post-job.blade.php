<!DOCTYPE html>
<html>
<head>
    <title>Post Job</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Post a New Job</h1>
        <form method="POST" action="{{ url('employers/post-job') }}">
            @csrf
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Job Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="skills">Required Skills</label>
                <input type="text" class="form-control" id="skills" name="skills" required>
            </div>
            <div class="form-group">
                <label for="salary_range">Salary Range</label>
                <input type="text" class="form-control" id="salary_range" name="salary_range" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="work_type">Work Type</label>
                <select class="form-control" id="work_type" name="work_type" required>
                    <option value="remote">Remote</option>
                    <option value="on-site">On-site</option>
                </select>
            </div>
            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
            </div>
            <button type="submit" class="btn btn-primary" >Post Job</button>
        </form>
    </div>
</body>
</html>

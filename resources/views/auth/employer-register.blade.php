<!DOCTYPE html>
<html>
<head>
    <title>Employer Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Employer Registration</h1>
        <form method="POST" action="{{ url('employers/register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="col-md-4">
                <a href="{{ url('employers/post-job') }}" class="btn btn-primary btn-lg">Register</a>
            </div>
            {{-- <button type="submit" class="btn btn-primary"><a href="{{ url('employers/post-job') }}" style="text-decoration: none; color:white">Register</a></button> --}}
        </form>
    </div>
</body>
</html>

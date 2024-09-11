<!DOCTYPE html>
<html>
<head>
    <title>Manage Employers</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Manage Employers</h1>

        <!-- Employers Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employers as $employer)
                    <tr>
                        <td>{{ $employer->id }}</td>
                        <td>{{ $employer->name }}</td>
                        <td>{{ $employer->email }}</td>
                        <td>
                            <a href="{{ url('admin/employers/'.$employer->id) }}" class="btn btn-info btn-sm">View</a>
                            {{-- <a href="{{ url('admin/employers/'.$employer->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ url('admin/employers/'.$employer->id) }}" method="POST" style="display:inline;">
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


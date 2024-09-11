<!DOCTYPE html>
<html>
<head>
    <title>Manage Candidates</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Manage Candidates</h1>

        <!-- Candidates Table -->
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
                @foreach($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->id }}</td>
                        <td>{{ $candidate->name }}</td>
                        <td>{{ $candidate->email }}</td>
                        <td>
                            <a href="{{ url('admin/candidates/'.$candidate->id) }}" class="btn btn-info btn-sm">View</a>
                            {{-- <a href="{{ url('admin/candidates/'.$candidate->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ url('admin/candidates/'.$candidate->id) }}" method="POST" style="display:inline;">
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

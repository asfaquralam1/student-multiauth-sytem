<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Index</title>
</head>

<body>
    <a href="{{ URL::to('user/create') }}" class="btn btn-danger">Add User</a>
    <hr>
    <table class="table table-responsive">
        <tr>
            <th>SI</th>
            <th>User Name</th>
            <th>Student Email</th>
            <th>Action</th>
        </tr>
        @foreach ($user as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    <a href="{{ url('user/'.$row->id).'/edit' }}" class="btn btn-info">Edit</a>
                    <form action="{{ url('user/'.$row->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" style="submit">Delete</button>
                    </form>
                    <a href="{{ URL::to('user/'.$row->id) }}" class="btn btn-success">View</a>
                </td>
            </tr>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>

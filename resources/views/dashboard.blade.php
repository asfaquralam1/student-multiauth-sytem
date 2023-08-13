<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>dashboard</title>
</head>

<body style="background-color: #e7e7e7">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <div class="collapse navbar-collapse" style="margin: left" id="navbarNav">
                    <ul class="navbar-nav" style="margin-left:auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">{{ $student->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="/" method="POST" class="inline p-1">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="d-flex justify-content-center">
            <div class="bg-white w-50 p-3 rounded-lg">
                <h4 style="text-align: center">Dashboard</h4>
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
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>

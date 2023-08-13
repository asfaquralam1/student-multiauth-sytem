<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Students</title>
</head>

<body style="background-color: #e7e7e7">
    <div class="container-fluid" style="background-color: #13bdc9;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand" href="#" style="color: white ;width: 300px">STUDENT</a>
                    {{-- <img src="/public/image/student.jpg" class="css-class" alt="alt text" width="300px"> --}}
                    <ul class="navbar-nav"
                        style="display:flex; justify-content: space-between;font-size:20px;margin: 0 auto;">
                        <li class="nav-item">
                            <a class="nav-link" href="/instractors" style="color: white">Instructor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/courses" style="color: white">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register/student" style="color: white">Student</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="margin-left:auto;font-size:20px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">User</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="GET" class="inline p-1">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top: 50px">
        <table class="table table-bordered table-striped data-table" style="background-color: #e7e7e7; " id="datatable">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentshow as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td><img src="{{ asset('images') }}/{{ $row->image }}" style="max-width: 60px;"
                                alt="student_image"></td>
                        <td>
                            <div class="button_area" style="display: flex;justify-content:space-evenly">
                                <button class="btn btn-info"><a style="color: inherit;"
                                        href="{{ url('register/' . $row->id) . '/edit' }}"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                <form action="{{ url('register/' . $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" style="submit"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <a href="{{ URL::to('student/create') }}" class="btn btn-danger">Add User</a> --}}
    {{-- <hr> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>

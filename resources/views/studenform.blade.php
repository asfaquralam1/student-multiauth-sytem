<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>ajexcrud</title>
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
                            <a class="nav-link" href="/studentadd" style="color: white">Student</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="margin-left:auto;font-size:20px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">User</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('/') }}" method="POST" class="inline p-1">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Button trigger modal -->
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddModal">
                    Student Add Data
                </button>
            </div>
            <br>
            <table class="table table-bordered table-striped data-table" style="background-color: #e7e7e7" id="datatable">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->course }}</td>
                            <td>{{ $row->section }}</td>
                            <td>
                                <a href="#" class="btn btn-info editbtn">Edit</a>
                                <a href="#" class="btn btn-danger deletetbtn">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Add Modal -->
    <div class="modal fade" id="studentaddModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">j
                    <h4 class="modal-title">Student Add Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="addform">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" aria-describedby=""
                                placeholder="name" name="name">
                                @error('name')
                                <div class="text-small">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Course</label>
                            <input type="text" class="form-control" id="" aria-describedby=""
                                placeholder="course" name="course">
                        </div>
                        <div class="form-group">
                            <label for="">Section</label>
                            <input type="text" class="form-control" id="" aria-describedby=""
                                placeholder="section" name="section">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--Add Modal -->

    <!--Edit Modal -->
    <div class="modal fade" id="studenteditModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Student Update Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="editform">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby=""
                                placeholder="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Course</label>
                            <input type="text" class="form-control" id="course" aria-describedby=""
                                placeholder="course" name="course">
                        </div>
                        <div class="form-group">
                            <label for="">Section</label>
                            <input type="text" class="form-control" id="section" aria-describedby=""
                                placeholder="section" name="section">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit Modal -->


    <div class="modal fade" id="studentdeleteModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Student Update Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form id="deleteform">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" name="id" id="delete_id">
                        <p>Are you sure !! You want to delete data</p>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete Student Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    {{-- <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.studnets.index') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "course" },
                    { "data": "section" }
                ]
            });
        });
    </script> --}}

    {{-- edit data script --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#studenteditModal').modal('show');

                //Fatching data from the table row(Using jquery)/ we can use datatable to get data
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#name').val(data[1]);
                $('#course').val(data[2]);
                $('#section').val(data[3]);

                $('#editform').on('submit', function(e) {
                    e.preventDefault();

                    var id = $('#id').val();

                    $.ajax({
                        type: "PUT",
                        url: "studentupdate/" + id,
                        data: $('#editform').serialize(),
                        success: function(response) {
                            console.log(response);
                            $('#studenteditModal').modal('hide');

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                });
            })
        });
    </script>


    {{-- Delete data script --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.deletetbtn').on('click', function() {
                $('#studentdeleteModal').modal('show');

                //Fatching data from the table row(Using jquery)/ we can use datatable to get data
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

                $('#deleteform').on('submit', function(e) {
                    e.preventDefault();

                    var id = $('#delete_id').val();

                    $.ajax({
                        type: "DELETE",
                        url: "studentdelete/" + id,
                        data: $('#deleteform').serialize(),
                        success: function(response) {
                            console.log(response);
                            $('#studentdeleteModal').modal('hide');
                            // alert("Data Updated");
                            // window.location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                });
            })
        });
    </script>


    {{-- Add data script --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('#addform').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "studentadd",
                    datatype: 'JSON',
                    data: $('#addform').serialize(),
                    success: function(response) {
                        console.log(response);
                        // $("#result").html(tekst);
                        $('#studentaddModal').modal('hide');
                        // alert('Data Saved');
                        // location.reload();
                        // for clearing the input field
                    },
                    error: function(error) {
                        console.log("ERROR:" + error);
                    }
                });
            })
        })
    </script>

</body>

</html>

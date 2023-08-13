<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body style="background-color: #FFFFFF">
    <div class="container-fluid" style="background-color: #13bdc9;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                {{-- <img src="/public/image/student.jpg" alt="profile-img" width="300px"> --}}
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand" href="#" style="color: white;width: 250px">STUDENT</a>
                    <ul class="navbar-nav"
                        style="display:flex; justify-content: space-between;font-size:20px;margin: 0 auto;">
                        <li class="nav-item">
                            <a class="nav-link" href="/instractors" style="color: white">Instructor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/courses" style="color: white">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register/student" style="color: white">Student</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="margin-left:auto;font-size:20px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">User</a>
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
    </div>
    @yield('content')
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
        integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#datatable').DataTable();

            table.on('click', '#edit', function() {
                $tr = $(this).closest('tr');
                if (($($tr)).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#course_t').val(data[1]);
                $('#credit_h').val(data[2]);
                $('#instructor_name').val(data[3]);

                $('#editform').attr('action', 'courses-update/' + data[0]);
                $('#editcourseModal').modal('show');
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            fecthins();

            function fecthins() {
                $.ajax({
                    type: 'GET',
                    url: 'instractorsshow',
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                        $.each(response.instructors, function(key, item) {
                            $('tbody').append('<tr>\
                                                                                                       <td>' + item.id + '</td>\
                                                                                                      <td>' + item
                                .instractor_name + '</td>\
                                                                                                       <td>' + item
                                .instractor_email + '</td>\
                                                                                                       <td>' + item
                                .instractor_phone +
                                '</td>\
                                                                                                       <td><button type="button" value="' +
                                item
                                .id +
                                '" class="m-2 edit_inst btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><button type="button" value="' +
                                item.id + '" class="delete_inst btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></td>\
                                                                                                       </tr>');
                        });
                    },
                });
            }

            $(document).ready(function() {
                $(document).on('click', '.edit_inst', function(e) {
                    e.preventDefault();
                    var ist_id = $(this).val();
                    // console.log(ist_id);
                    $('#instractoreditModal').modal('show');
                    $.ajax({
                        type: 'GET',
                        url: "/edit-isntractor/" + ist_id,
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            if (response.status == 404) {
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-danger');
                                $('#success_message').text(response.message);
                            } else {
                                $('#edit_name').val(response.instractor
                                    .instractor_name);
                                $('#edit_email').val(response.instractor
                                    .instractor_email);
                                $('#edit_number').val(response.instractor
                                    .instractor_phone);
                                $('#edit_istid').val(ist_id);
                            }
                        }
                    })
                });
            });

            //Update Instractor Info
            $(document).ready(function() {
                $(document).on('click', '.update_inst', function(e) {
                    e.preventDefault();
                    var ist_id = $('#edit_istid').val();
                    var my_data = {
                        'instractor_name': $('#edit_name').val(),
                        'instractor_email': $('#edit_email').val(),
                        'instractor_phone': $('#edit_number').val(),
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "PUT",
                        url: "update-isntractor/" + ist_id,
                        data: my_data,
                        dataType: "json",
                        success: function(response) {
                            // console.log('successs');
                            if (response.status == 400) {
                                $('#updateform_errlist').html("");
                                $('#updateform_errlist').addClass("alert alert-danger");
                                $.each(response.errors, function(key, err_values) {
                                    $('#updateform_errlist').append('<li>' +
                                        err_values +
                                        '</li>');
                                });
                            } else {
                                $('#updateform_errlist').html("");
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);

                                $('#instractoreditModal').modal('hide');
                                fecthins();
                            }
                        }
                    });
                });
            });

            //Delete Instractor
            $(document).on('click', '.delete_inst', function(e) {
                e.preventDefault();
                var ist_id = $(this).val();
                $('#delete_istid').val(ist_id);
                // $('#deleteinstractorModal').modal('show');
            });

            $(document).on('click', '.delete_inst', function(e) {
                e.preventDefault();

                var ist_id = $('#delete_istid').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "delete-isntractor/" + ist_id,
                    dataType: "json",
                    success: function(response) {
                        $('#success_message').addClass('alert alert-success');
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        // $('#deleteinstractorModal').modal('hide');
                        fecthins();
                    }
                });
            });
            //Add instractor
            $(document).ready(function() {
                $(document).on('click', '.add_inst', function(e) {
                    e.preventDefault();

                    var my_data = {
                        'instractor_name': $('#instractor_name').val(),
                        'instractor_email': $('#instractor_email').val(),
                        'instractor_phone': $('#instractor_phone').val(),
                    }
                    console.log(my_data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/instractors",
                        data: my_data,
                        datatype: "json",
                        success: function(response) {
                            // console.log(response);
                            // $('#instractoraddModal').modal('hide');
                            if (response.status == 400) {
                                $('#saveform_errlist').html("");
                                $('#saveform_errlist').addClass("alert alert-danger");
                                $.each(response.errors, function(key, err_values) {
                                    $('#saveform_errlist').append('<li>' +
                                        err_values +
                                        '</li>');
                                });
                            } else {
                                $('#saveform_errlist').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#instractoraddModal').modal('hide');
                                $('#instractoraddModal').find('input').val("");
                                fecthins();
                            }
                        },
                    });
                });
            });
        });
    </script>
</body>

</html>

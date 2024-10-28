@extends('layout.app')
@section('page_title', 'Instractor')
@section('instractor_select', 'active')
@section('content')
    <h1 class="mb-10" style="text-align: center">Instractor</h1>

    <div class="modal fade" id="instractoraddModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Instractor Add Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="instractor_name">Name</label><br>
                        <input type="text" class="form-control required instractor_name" placeholder="name"
                            id="instractor_name" name="instractor_name" required="true">
                        <span class="text-danger error-text instractor_name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="instractor_email">Email</label><br>
                        <input type="text" class="form-control" placeholder="email" id="instractor_email"
                            name="instractor_email" required>
                        <span class="text-danger error-text instractor_email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="instractor_phone">Number</label><br>
                        <input type="number" class="form-control instractor_phone" placeholder="number"
                            id="instractor_phone" name="instractor_phone" required>
                        <span class="text-danger error-text instractor_phone_error"></span>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary add_inst">Add Data</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary add_inst">Add Data</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <--endAddmodel--> --}}

    <div class="modal fade" id="instractoreditModal">
        <div class="modal-dialog">
            <div id="#success_message"></div>
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Instractor Edit Modal</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input hidden="text" id="edit_istid">

                    <div class="form-group">
                        <label for="instractor_name">Name</label><br>
                        <input type="text" class="form-control" placeholder="name" name="instractor_name" id="edit_name">
                        @error('instractor_name')
                            <div class="text-danger text-small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instractor_email">Email</label><br>
                        <input type="text" class="form-control" placeholder="email" name="instractor_email"
                            id="edit_email">
                        @error('instractor_email')
                            <div class="text-small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instractor_phone">Number</label><br>
                        <input type="number" class="form-control" placeholder="number" name="instractor_phone"
                            id="edit_number">
                        @error('instractor_phone')
                            <div class="text-small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_inst">Update</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteinstractorModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Deleting Instactor Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" id="delete_istid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_inst">Delete</button>
                </div>

            </div>
        </div>
    </div>

    {{-- endeditmodel --}}

    <div class="container">
        {{-- {{ $course }} --}}
        <div id="message_id">
            @if (session('success'))
                <div class="bg-success w-25 mb-2"
                    style="padding:15px;color:#e7e7e7;font-weight:bold;text-align:center;font-size:15px">
                    {{ session('success') }}
                </div>
            @endif
            {{-- @if (session('updated'))
        <div class="bg-success w-25 mb-2" style="padding:15px;color:#e7e7e7;font-weight:bold;text-align:center;font-size:15px">
            {{ session('updated') }}
        </div>
    @endif --}}
        </div>
        <div class="jumbotron">
            <button type="button" class="btn btn-primary" style="margin-bottom: 10px" data-toggle="modal" data-target="#instractoraddModal">
                Add Instractor
            </button>
            <br>
            <table class="table table-bordered table-striped datatable" style="background-color: #e7e7e7" id="datatable">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>Instractor Name</th>
                        <th>Instractor Email</th>
                        <th>Instractor Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
        integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}

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
                            $('tbody').append(
                                '<tr>\
                                                                                                                           <td>' +
                                item
                                .id +
                                '</td>\
                                                                                                                           <td>' +
                                item
                                .instractor_name +
                                '</td>\
                                                                                                                           <td>' +
                                item
                                .instractor_email +
                                '</td>\
                                                                                                                           <td>' +
                                item
                                .instractor_phone +
                                '</td>\
                                                                                                                           <td><button type="button" value="' +
                                item
                                .id +
                                '" class="m-2 edit_inst btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><button type="button" value="' +
                                item.id +
                                '" class="delete_inst btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button></td>\
                                                                                                                           </tr>'
                                );
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
                        url: "/instractor",
                        data: my_data,
                        datatype: "json",
                        beforeSend: function() {
                            $(document).find('span.error-text').text('')
                        },
                        success: function(response) {
                            // console.log(response);
                            // $('#instractoraddModal').modal('hide');
                            if (response.status == 400) {
                                $('#saveform_errlist').html("");
                                $('#saveform_errlist').addClass("alert alert-danger");
                                // $.each(response.errors, function(key, err_values) {
                                //     $('#saveform_errlist').append('<li>' +
                                //         err_values +
                                //         '</li>');
                                $.each(response.errors, function(prefix, val) {
                                    $('span.' + prefix + '_error').text(val[0]);
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
@endsection

@extends('layout.app')
@section('page-title', 'Practice')
@section('content')
<div class="container" style="margin-top: 50px">
    <div class="from-area">
        <h1 class="text-center">Form</h1>
        <form method="post" action="{{route('parctice-create')}}">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" placeholder="name" name="name" id="name" class="form-control" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <span class="error" id="nameError"></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="saveform_errlist"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary add_user" type="button">Save</button>
        </form>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $(document).on('click', '.add_user', function(e) {
    //         e.preventDefault();

    //         var my_data = {
    //             'name': $('#name').val(),
    //             'email': $('#email').val(),
    //             'password': $('#password').val(),
    //         }
    //         console.log(my_data);
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         $.ajax({
    //             type: 'POST',
    //             url: "{{route('parctice-create')}}",
    //             data: my_data,
    //             datatype: "json",
    //             beforeSend: function() {
    //                 $(document).find('span.error-text').text('')
    //             },
    //             success: function(response) {
    //                 // console.log(response);
    //                 // $('#instractoraddModal').modal('hide');
    //                 if (response.status == 400) {
    //                     $('#saveform_errlist').html("");
    //                     $('#saveform_errlist').addClass("alert alert-danger");
    //                     // $.each(response.errors, function(key, err_values) {
    //                     //     $('#saveform_errlist').append('<li>' +
    //                     //         err_values +
    //                     //         '</li>');
    //                     $.each(response.errors, function(prefix, val) {
    //                         $('span.' + prefix + '_error').text(val[0]);
    //                     });
    //                 } else {
    //                     $('#saveform_errlist').html("");
    //                     $('#success_message').addClass('alert alert-success');
    //                     $('#success_message').text(response.message);
    //                 }
    //             },
    //         });
    //     });
    // });
    $(document).ready(function() {
    $(document).on('click', '.add_user', function(e) {
        e.preventDefault();

        var my_data = {
            'name': $('#name').val(),
            'email': $('#email').val(),
            'password': $('#password').val(),
        };
        console.log(my_data);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'POST',
            url: "{{route('parctice-create')}}",
            data: my_data,
            datatype: "json",
            beforeSend: function() {
                $(document).find('span.error-text').text('');
                $('#saveform_errlist').html(""); // Clear previous error messages
            },
            success: function(response) {
                if (response.status == 400) {
                    $('#saveform_errlist').html("");
                    $('#saveform_errlist').addClass("alert alert-danger");
                    
                    $.each(response.errors, function(prefix, val) {
                        // Append each error message to the error list
                        $('#saveform_errlist').append('<li>' + val[0] + '</li>');
                        $('span.' + prefix + '_error').text(val[0]); // Show individual field errors
                    });
                } else {
                    $('#saveform_errlist').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                }
            },
            error: function(xhr) {
                // Handle other errors (e.g., 500, 404)
                $('#saveform_errlist').html('<li>Something went wrong. Please try again later.</li>');
                $('#saveform_errlist').addClass("alert alert-danger");
            }
        });
    });
});
</script>
@endsection
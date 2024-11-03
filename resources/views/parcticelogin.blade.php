@extends('layout.app')
@section('page-title', 'login')
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="from-area">
            <h1 class="text-center">Form</h1>
            <form method="post" action="{{ route('practice-login') }}">
                @csrf
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
                <p id="result"></p>
                <button class="btn btn-primary" id="btn" type="button">Login</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#btn').click(function() {
                var my_data = {
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('practice-login') }}',
                    type: 'POST',
                    datatype: 'json',
                    data: my_data,
                    success: function(response) {
                        $('#result').text(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                })
            })
        })
    </script>
@endsection

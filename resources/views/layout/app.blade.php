<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body style="background-color: #FFFFFF">
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
                            <a class="nav-link" href="{{ url('/register/student') }}" style="color: white">Studented</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav" style="margin-left:auto;font-size:20px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('/') }}"
                                style="color: white">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register" style="color: white">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
</body>

</html>

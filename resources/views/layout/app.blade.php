<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
    integrity="sha512-U6K1YLIFUWcvuw5ucmMtT9HH4t0uz3M366qrF5y4vnyH6dgDzndlcGvH/Lz5k8NFh80SN95aJ5rqGZEdaQZ7ZQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>@yield('page_title')</title>
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
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/courses" style="color: white">Courses</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/courses" style="color: white">courses</a>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    {{-- <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("#message_id").remove();
            }, 3000);
        });

        $(function() {
            $(".xzoom").xzoom({
                zoomWidth: 400,
                tint: "#333",
                Xoffset: 15,
            });
        })
    </script> --}}

    @yield('content')
</body>

</html>

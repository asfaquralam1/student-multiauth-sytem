@extends('Instractor.createinstractor')
@section('content')
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
@endsection

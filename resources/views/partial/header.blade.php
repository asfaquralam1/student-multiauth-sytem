<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1C305C;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav" style="display:flex;justify-content:space-between;">
            <a class="navbar-brand" style="color: white;" href="#">S M C</a>
            {{-- <img src="/public/image/student.jpg" class="css-class" alt="alt text" width="300px"> --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('instractors.index')}}">Instructor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('courses')}}">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register-student') }}">Student</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if (Auth::user())
                <a class="nav-link" href="">{{auth()->user()->name}}</a>
                @else
                <a class="nav-link" href="" style="color: white"><i class="fa fa-user"></i></a>
                @endif
            </ul>
        </div>
    </div>
</nav>
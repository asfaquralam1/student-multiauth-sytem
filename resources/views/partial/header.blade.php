<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #121954;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="navbar-brand" href="#" style="color: white ;width: 300px">S M C</a>
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
                    <a class="nav-link" href="{{ url('/register/student') }}" style="color: white">Student</a>
                </li>
            </ul>
            <ul class="navbar-nav" style="margin-left:auto;font-size:20px;">
                @if (Auth::user())
                <a class="nav-link" href="">{{auth()->user()->name}}</a>
                @else
                <a class="nav-link" href="" style="color: white"><i class="fa fa-user"></i></a>
                @endif
            </ul>
        </div>
    </div>
</nav>
@extends('layout.app')
@section('content')
<h2 style="text-align: center; margin-top: 30px">Create An Account</h2>
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
        style="width:400px; margin:0 auto;margin-top: 50px; padding: 20px;background-color: #F5F5F5;">
        <h5 style="text-align:center;font-size:22px;font-weight:600;color:#212529">Register</h5>
        @csrf
        <div class="mb-3">
            @if (session('status'))
                <div class="bg-danger p-4 rounded-lg mb-5 text-white text-center ">
                    {{ session('status') }}
                </div>
            @endif
            <div class="flash-message">
                @foreach (['success', 'danger', 'info'] as $msg)
                    @if (Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ session::get('alert-' . $msg) }} <a href="#"
                                class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" placeholder="Your Name" required  name="name">
            @error('name')
            <div class="text-danger text-small">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="eamil" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Your Email" required name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%">SIGN UP</button>
    </form>
@endsection

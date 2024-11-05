@extends('layout.app')
@section('content')
<div class="from-area">
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="form">
        <h3 class="from-header">Register</h3>
        @csrf
        <div class="flash-message">
            @foreach (['success', 'danger', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ session::get('alert-' . $msg) }} <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
            @endforeach
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" placeholder="Your Name" name="name">
            @error('name')
            <p class="text-danger text-small">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="eamil" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
            @error('email')
            <p class="text-danger text-small">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            @error('password')
            <p class="text-danger text-small">
                {{ $message }}
            </p>
            @enderror
        </div>
        @if (session('status'))
        <p class="bg-danger p-4 rounded-lg mb-5 text-white text-center ">
            {{ session('status') }}
        </p>
        @endif
        <button type="submit" class="btn btn-primary w-100">SIGN UP</button>
    </form>
</div>
@endsection
@extends('layout.app')
@section('content')
<div class="from-area">
    <form action="{{ route('login') }}" method="POST" class="form">
        <h3 class="from-header">Login</h3>
        @csrf
        <div class="flash-message">
            @foreach (['success', 'danger', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }}">{{ session::get('alert-' . $msg) }} <a href="#"
                    class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
            @endif
            @endforeach
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
            @error('email')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            @error('password')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        @if (session('status'))
        <div class="bg-danger mt-3 p-2 rounded-lg text-white text-center ">
            {{ session('status') }}
        </div>
        @endif
        <button type="submit" class="btn btn-primary w-100">Log in</button>
    </form>
</div>
@endsection
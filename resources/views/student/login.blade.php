@extends('layout.app')
@section('content')
    <div class="from-area">
        <form action="{{ route('login') }}" method="POST">
            <h5 class="from-header">Login</h5>
            @csrf
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
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('password') border border-danger
                @enderror" id="exampleInputEmail1" placeholder="Email" name="email">
                @error('email')
                    <div class="text-danger text-small">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                    class="form-control @error('password') border border-danger
                @enderror"
                    id="exampleInputPassword1" placeholder="Password" name="password">
                @error('password')
                    <div class="text-danger text-small">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;margin-top:10px">Log in</button>
        </form>
    </div>
@endsection

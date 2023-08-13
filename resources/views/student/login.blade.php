@extends('layout.app')
@section('content')
    <div class="from">
        <h2 style="text-align: center; padding-top:40px">Login To Your Account</h2>
        <form action="{{ route('/') }}" method="POST"
            style="width:400px; margin:0 auto;margin-top: 40px;padding: 40px;background-color: #F5F5F5;">
            <h5 style="text-align:center;font-size:22px;font-weight:600;color:#212529">Login</h5>
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
            <button type="submit" class="btn btn-primary" style="width: 100%;margin-top:10px">Sign In</button>
        </form>
    </div>
@endsection

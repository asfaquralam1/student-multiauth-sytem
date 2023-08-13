@extends('layout.app')
@section('content')
    <div class="from">
        <form action="{{ route('verify') }}" method="POST"
            style="width:400px; margin:0 auto;margin-top: 50px;padding: 20px;background-color: F5F5F5;">
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
            {{-- <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email" name="email" value="">
            </div> --}}
            <div class="mb-3">
                <label for="password" class="form-label">Verification code</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="verification code"
                    name="verification_code">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

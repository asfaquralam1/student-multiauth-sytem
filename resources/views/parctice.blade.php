@extends('layout.app')
@section('page-title', 'Practice')
@section('content')
<div class="container" style="margin-top: 50px">
    <div class="from-area">
        <h1 class="text-center">Form</h1>
        <form method="post" action="{{route('practice-create')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" placeholder="name" name="name" id="name" class="form-control">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <span class="error" id="nameError"></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="saveform_errlist"></div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirmation Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Confirm Password">
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary add_user" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
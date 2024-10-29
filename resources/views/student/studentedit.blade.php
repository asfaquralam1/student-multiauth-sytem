@extends('layout.app')
@section('page_title', '')
@section('content')
<h2 style="text-align: center; margin-top: 10px">Profile Update</h2>
<div class="container">
    <form action="{{ url('register/' . $student->id) }}" method="POST" enctype="multipart/form-data"
        style="width:400px; margin:0 auto;margin-top: 20px; padding: 20px;background-color: #F5F5F5;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" value="{{ $student->name }}" required
                name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="{{ $student->email }}" required
                name="email">
        </div>
        <div class="mb-3">
            <label for="Phone" class="form-label">Phone</label>
            <input type="test" class="form-control" id="exampleInputPassword1" value="{{ $student->phone }}"
                name="phone">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $student->address }}"
                name="address">
        </div>
        <div class="mb-3">
            <label for="Courses">Courses</label>
            <select class="js-example-basic-multiple" name="courses[]" multiple style="width: 100%">
                <option value="" disabled {{ (old('courses', $selectedCourses ?? []) == null) ? 'selected' : '' }}>Select courses</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}"
                    @if (in_array($course->id, old('courses', $selectedCourses ?? []))) selected @endif>
                    {{ $course->course_title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $student->gender }}"
                name="gender">
        </div>
        <div class="mb-3">
            <label for="DateofBirth" class="form-label">DateofBirth</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $student->date_of_birth }}"
                name="date_of_birth">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" value="{{ $student->image }}" required
                name="image">
        </div>
        <div class="mb-3">
            <label for="certificate" class="form-label">Certificated</label>
            <input type="file" class="form-control" id="exampleInputPassword1" value="{{ $student->certificate }}"
                name="certificate">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
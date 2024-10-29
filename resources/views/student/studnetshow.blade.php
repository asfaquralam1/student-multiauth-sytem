@extends('layout.app')
@section('page_title', 'Student Information')
@section('content')
    <div class="container" style="margin-top: 50px">
        <table class="table table-bordered table-striped data-table" style="background-color: #e7e7e7; " id="datatable">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Courses</th>
                    <th>DOB</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentshow as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>
                            @if ($row->courses->isEmpty())
                                No Courses
                            @else
                                <ul>
                                    @foreach ($row->courses as $course)
                                    {{ var_dump($course) }}
                                        <li style="color: black">{{ $course->course }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>{{ $row->date_of_birth }}</td>
                        <td><img src="{{ asset('images') }}/{{ $row->image }}" style="max-width: 60px;" alt="student_image">
                        </td>
                        <td>
                            <div class="button_area" style="display: flex;justify-content:space-evenly">
                                <button class="btn btn-info"><a style="color: inherit;"
                                        href="{{ url('register/' . $row->id) . '/edit' }}"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a></button>
                                <form action="{{ url('register/' . $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" style="submit"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

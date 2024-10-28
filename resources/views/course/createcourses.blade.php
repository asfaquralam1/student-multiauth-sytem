@extends('layout.app')
@section('content')
<h1 class="mb-10" style="text-align: center">Course</h1>
    <!-- Modal -->
    <div class="modal fade" id="courseAddModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="courseAddModal">Course Add Model
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add-courses') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="course_title">Course title</label><br>
                            <input type="text" class="form-control" placeholder="course_title" id="course_title"
                                name="course_title" required>
                        </div>
                        <div class="form-group">
                            <label for="credit_hour">Credit hour</label><br>
                            <input type="number" class="form-control" placeholder="credit hour" id="credit_hour"
                                name="credit_hour" required>
                        </div>
                        <label for="instractor_name">Instractor</label>
                        <select class="js-example-basic-single" name="instructor_name" style="width: 100%" required>
                            @foreach ($instractors as $post)
                                <option value="{{ $post->instractor_name }}">{{ $post->instractor_name }}</option>
                            @endforeach
                        </select>
                        {{-- add student --}}
                        {{-- <div class="mb-3">
                            <label for="students">Students</label>
                            <select class="js-example-basic-multiple" name="students" multiple="multiple"
                                style="width: 100%">
                                @foreach ($student as $students)
                                    <option value="{{ $students->name }}">{{ $students->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- endaddmodal --}}

    <!-- EditModal -->
    <div class="modal fade" id="editcourseModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editcourseModal">Course Edit Model
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('courses-update/') }}" method="POST" id="editform">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <label for="course_title">Course title</label><br>
                            <input type="text" class="form-control" placeholder="course_title" id="course_t"
                                name="course_title" value="">
                        </div>
                        <div class="form-group">
                            <label for="credit_hour">Credit hour</label><br>
                            <input type="number" class="form-control" placeholder="credit_hour" id="credit_h"
                                name="credit_hour" value="">
                        </div>
                        <label for="instractor_name">Instractor</label>
                        <select class="js-example-basic-single" name="instructor_name" style="width: 100%"
                            id="instructor_name">
                            @foreach ($instractors as $post)
                                <option value="{{ $post->instractor_name }}">{{ $post->instractor_name }}</option>
                            @endforeach
                        </select>
                        {{-- <div class="mb-3">
                            <label for="students">Students</label>
                            <select class="js-example-basic-multiple" name="students[]" multiple="multiple"
                                style="width: 100%">
                                @foreach ($student as $student)
                                    <option value="{{ $students->name }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- endeditmodal --}}

    <div class="container">
        <div class="jumbotron">
            <div id="message_id">
                @if (session('success'))
                    <div class="bg-success w-25 mb-2"
                        style="padding:15px;color:#e7e7e7;font-weight:bold;text-align:center;font-size:15px">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('updated'))
                    <div class="bg-success w-25 mb-2"
                        style="padding:15px;color:#e7e7e7;font-weight:bold;text-align:center;font-size:15px">
                        {{ session('updated') }}
                    </div>
                @endif
                @if (session('deleted'))
                    <div class="bg-danger w-25 mb-2"
                        style="padding:15px;color:#e7e7e7;font-weight:bold;text-align:center;font-size:15px">
                        {{ session('deleted') }}
                    </div>
                @endif
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#courseAddModal"
                style="margin-bottom: 10px">
                Add Course
            </button>
            <br>
            <table class="table table-bordered table-striped datatable" style="background-color: #e7e7e7;"
                id="datatable">
                <thead>
                    <tr>
                        <th style="text-align: center">SI</th>
                        <th style="text-align: center">Course Title</th>
                        <th style="text-align: center">Cradit Hour</th>
                        <th style="text-align: center">Instractor Name</th>
                        <th style="text-align: center">Studnets Enrolled</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $row)
                        <tr>
                            <td style="text-align: center">{{ $row->id }}</td>
                            <td style="text-align: center">{{ $row->course_title }}</td>
                            <td style="text-align: center">{{ $row->credit_hour }}</td>
                            <td style="text-align: center">{{ $row->instructor_name }}</td>
                            <td style="text-align: center">{{ $row->students }}</td>
                            <td>
                                <div class="button_area" style="display: flex;justify-content:space-evenly">
                                    <a class="btn btn-info edit btn-sm" style="color: inherit;width:30px"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <form action="{{ url('courses/' . $row->id) }}" method="POST" id="delete"
                                        style="width: 30px">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" style="submit"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#datatable').DataTable();

            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if (($($tr)).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();

                $('#course_t').val(data[1]);
                $('#credit_h').val(data[2]);
                $('#instructor_name').val(data[3]);

                $('#editform').attr('action', 'courses-update/' + data[0]);
                $('#editcourseModal').modal('show');
            })
        });
    </script>
    <script>
        $("document").ready(function() {
            setTimeout(function() {
                $("#message_id").remove();
            }, 3000);
        });
    </script>
@endsection

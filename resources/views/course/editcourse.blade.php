<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>courses</title>
</head>

<body style="background-color: #e7e7e7">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editcourseModal">Course Edit Model
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('courses-update/'.$course->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="course_title">Course title</label><br>
                    <input type="text" class="form-control" placeholder="course_title" id="course_title"
                        name="course_title" value="{{ $course->course_title }}">
                </div>
                <div class="form-group">
                    <label for="credit_hour">Credit hour</label><br>
                    <input type="number" class="form-control" placeholder="credit hour" id="credit_hour"
                        name="credit_hour" value="{{ $course->credit_hour }}">
                </div>
                <label for="instractor_name">Instractor</label>
                <select class="js-example-basic-single" name="instructor_name" style="width: 100%" value="{{ $course->instructor_name }}">
                    @foreach ($instractors as $post)
                        <option value="{{ $course->instructor_name }}">{{ $post->instractor_name }}</option>
                    @endforeach
                </select>
                {{-- <div class="form-group">
                    <label for="instractor_name">instractor_name</label><br>
                    <input type="text" class="form-control" placeholder="instructor_name" id="instructor_name"
                        name="instructor_name" value="{{ $course->instructor_name }}">
                </div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

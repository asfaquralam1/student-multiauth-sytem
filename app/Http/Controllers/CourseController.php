<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use App\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $instractors = Instructor::all();
        $student = Student::all();
        $courses = Course::with('students')->get();
        return view('course.createcourses', compact('instractors', 'student', 'courses'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'course_title' => 'required',
            'credit_hour' => 'required',
            'instructor_name' => 'required',
            // 'students' => 'required'
        ]);

        $courses = new Course();
        $courses->course_title = $request->course_title;
        $courses->credit_hour = $request->credit_hour;
        $courses->instructor_name = $request->instructor_name;
        // $courses->students = $request->students;
        $courses->save();
        // Toastr::success('Course added', '', ['success']);
        return back()->with('success', 'Course added');
        //for serializing the array
        // $arr = serialize($request['students']);
        // $courses->students = $arr;
        // dd($courses);
        // $courses = json_decode($courses);
    }
    public function show(Request $request)
    {
        $instractors = Instructor::all();
        // task check the realtionship value
        // $user = Instructor::all()->instructor();

        $student = Student::all();
        $courses = Course::all();
        return view('course.createcourses', compact('instractors', 'student','courses'));
    }
    public function edit($id)
    {
        $course = Course::find($id);
        // return view('course.editcourse');
        $instractors = Instructor::all();
        return view('course.editcourse', compact('course', 'instractors', $course));
    }
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->course_title = $request->input('course_title');
        $course->credit_hour = $request->input('credit_hour');
        $course->instructor_name = $request->input('instructor_name');
        $course->students = json_encode($request->input('students'));
        $course->update();
        return back()->with('updated', 'Successfully Updated');
    }
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return back()->with('deleted', 'Successfully Deleted');
    }
}

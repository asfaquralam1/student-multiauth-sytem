<?php

namespace App\Http\Controllers;

use App\Model\Studentfrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentfromController extends Controller
{
    public function index()
    {
        return view('studenform');
    }

    public function store(Request $request)
    {
        $studentfrom = new Studentfrom();

        $studentfrom->name = $request->input('name');
        $studentfrom->course = $request->input('course');
        $studentfrom->section = $request->input('section');

        $studentfrom->save();
        // $input = $request->all();
        // Log::info($input);

        // return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    public function show()
    {
        $student = Studentfrom::all();
        return view('studenform')->with('student',$student);
    }
    public function update(Request $request, $id)
    {
        $student = Studentfrom::find($id);
        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->section = $request->input('section');

        $student->save();
        return $student;
    }

    public function delete($id){
        $student = Studentfrom::find($id);
        $student->delete();
        return $student;
    }
}

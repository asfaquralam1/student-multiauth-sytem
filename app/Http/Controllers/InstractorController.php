<?php

namespace App\Http\Controllers;

use App\Course;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstractorController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     return view('Instractor.createinstractor');
        // } else {
        //     return redirect('/')->with('status', 'Please login first');
        // }
        return view('Instractor.createinstractor');
    }
    public function store(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'instractor_name' => 'required|max:30',
            'instractor_email' => 'required|email||unique:instructors',
            'instractor_phone' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->toArray(),
            ]);
        } else {
            $instructors = new Instructor();
            $instructors->instractor_name = $request->input('instractor_name');
            $instructors->instractor_email = $request->input('instractor_email');
            $instructors->instractor_phone = $request->input('instractor_phone');
            $instructors->save();
            return response()->json([
                'status' => 200,
                'message' => 'Instructors Added Successfully',
            ]);
            return back()->with('success','created successfully');
        }
    }

    public function show()
    {
        $instructors = Instructor::all();
        return response()->json(
            [
                'instructors' => $instructors,
            ]
        );
        return view('Instractor.createinstractor',compact('instructors'));
    }
    public function edit($id)
    {
        $instructors = Instructor::find($id);
        if ($instructors) {
            return response()->json([
                'status' => 200,
                'instractor' => $instructors,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Instractor not found',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'instractor_name' => 'required|max:30',
            'instractor_email' => 'required|email|max:40',
            'instractor_phone' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
            ]);
        } else {
            $instructors = Instructor::find($id);
            if ($instructors) {
                $instructors->instractor_name = $request->input('instractor_name');
                $instructors->instractor_email = $request->input('instractor_email');
                $instructors->instractor_phone = $request->input('instractor_phone');
                $instructors->update();
                return response()->json([
                    'status' => 200,
                    'errors' => 'Student Updated Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Instractor not found',
                ]);
            }
        }
    }
    public function destroy($id)
    {
        $instructor = Instructor::find($id);
        $instructor->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully',
        ]);
        // return back()-with('status', 'Successfully deleted');
    }
}

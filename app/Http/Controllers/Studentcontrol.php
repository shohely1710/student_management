<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\branch;
use App\Models\course;


class Studentcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = course::all();
        $branches = branch::all();
        return view('studentregister', compact(['courses', 'branches']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a new object for student model and save the field after submitting the form
        $student = new student;
        $student->sname = $request->sname;
        $student->fname = $request->fname;
        $student->class = $request->class;
        $student->phnum = $request->phnum;
        $student->email = $request->email;
        $student->course_id = $request->course_id;
        $student->branch_id = $request->branch_id;
        $student->image = $request->file('image')->getClientOriginalName();
        $student->save();

        $request->image->move(public_path('postimg'), $student->image);
        return redirect('studentregisterform');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $students = student::paginate(4);
        return view('studentdetails', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = student::find($id);
        return view('studentedit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = student::find($id);
        $student->sname = $request->sname;
        $student->fname = $request->fname;
        $student->class = $request->class;
        $student->phnum = $request->phnum;
        $student->email =$request->email;
        $student->save();
        return redirect('studentdetails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = student::find($id);
        $student->delete();
        return redirect('studentdetails');
    }
    public function courses(Request $request)
    {
        $id = $request->id;
        $data['courses'] = Course::where('branch_id', $id)->get();
        echo json_encode($data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SubjectClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\Subject;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classes = SubjectClass::all();

        return view('partial.admin.Class.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::whereHas('usertype',function ($query){
            $query->where('type_id' , 2);
            
        })->get();

        $subjects = Subject::all();
        $shifts = Shift::all();


        return view('partial.admin.Class.create',compact('teachers','subjects','shifts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bach' => 'required',
            'year'  => 'required',
            'subject_id' => 'required',
            'teacher_id' => 'required',
        ]);
        

        SubjectClass::create([
            'class_tag' => \Illuminate\Support\Str::random(6),
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'bach' => $request->bach,
            'shift_id' => $request->shift_id,
            'year' => $request->year 
        ]);

        return redirect()->route('admin.classes.index')->with('message','Sent Request successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
}

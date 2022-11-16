<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\StudentClass;
use App\Models\SubjectClass;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TeacherController extends Controller
{
    public function print_option($class_id)
    {
        return view('invoice.option',compact('class_id'));
    }
    
    public function printing($class_id){
        
        $students = StudentClass::where('class_tag',$class_id)->get();

        $pdf = Pdf::loadView('invoice\students_score');

        session()->put('students',$students);

        return $pdf->download('invoice.pdf');
    }
    public function AuthorizeUser()
    {
        $usertype = session('user.usertype.type.name'); 

        if($usertype != "Teacher"){
            abort(401);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->AuthorizeUser();

        if(session('usertype') != "Teacher"){
            
            if(session('usertype') == "User") return redirect()->route('user.index');
            if(session('usertype') == "Admin") return redirect()->route('Admin.index');

        }
        $all_student= 0;
        $classes= SubjectClass::where('teacher_id',session('user.id'))->get();
        
        foreach($classes as $class){
            $all_student += StudentClass::where('class_tag',$class->class_tag)->count();
        }

        $student_count = 0;
        return view('partial.teacher.dashboard',compact('classes','all_student'));
        
    }

    public function students(){

        $this->AuthorizeUser();

        return view('partial.teacher.students');
    }

    
    public function grading(){

        $this->AuthorizeUser();
        return view('partial.teacher.grading');
        
    }

    
    public function score(){

        $this->AuthorizeUser();

        return view('partial.teacher.score');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

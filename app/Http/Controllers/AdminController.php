<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\UserType;
use App\Models\SubjectClass;
use Illuminate\Http\Request;
use App\Models\RequestStudent;

class AdminController extends Controller
{
   
    public function AuthorizeUser()
    {
        $usertype = session('user.usertype.type.name'); 

        if($usertype != "Admin"){
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

        $teachers = UserType::where('type_id',2)->get();
        $students = Student::all();
        $classes = SubjectClass::all();

        return view('partial.admin.dashboard',compact('teachers','students','classes'));
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

    public function users()
    {
        $this->AuthorizeUser();

        return view('partial.admin.users');
    }
    public function teachers()
    {
        $this->AuthorizeUser();
        
        $teachers = UserType::where('type_id',2)->get();
        return view('partial.admin.teachers',compact('teachers'));
    }

    public function students()
    {
        $this->AuthorizeUser();
        
        $students = Student::all();
        return view('partial.admin.students',compact('students'));
    }

    public function request_students()
    {
        $this->AuthorizeUser();

        $requested_as_students = RequestStudent::all(); 
        
        return view('partial.admin.RequesteStudents',compact('requested_as_students'));
    }

    public function store_request_students(Request $request)
    {
        $hasCheck = $request->has('is_accepted');

        if(!$hasCheck)
        {
            return redirect()->route('admin.request_students');
        }

        


        foreach($request->is_accepted as $index)
        {
            $student = RequestStudent::find($index);

            Student::create([
                'student_id' => \Illuminate\Support\Str::random(6),
                'user_id' => $student->user_id,
                'phone' =>$student->phone,
                'name' =>$student->name,
                'email' => $student->email,
                'major_id' => $student->major_id,
                'sex' => $student->sex,
                'campus_id' => $student->campus_id,
                'shift_id' => $student->shift_id,
                'dob' => $student->dob,
                'pob' => $student->pob
            ]);

            RequestStudent::find($student->id)->delete();
        }

        

        return redirect()->route('admin.request_students')->with('message','Accepted Successfully!!');
    }

}

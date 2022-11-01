<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\RequestStudent;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\UserType;
use App\Traits\CheckUser;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function viewprofile()
    {
        return view('partial.student.ViewProfile');
    }

    public function view_score()
    {
        return view('partial.student.viewscore');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthorizeUser()
    {
        $usertype = session('user.usertype.type.name'); 

        if($usertype != "User"){
            abort(401);
        }
    }


    public function test(){

        $this->AuthorizeUser();

        $check = \App\Models\User::find(session('user.id'))->request_student;
        
        if($check){
            session()->put('already_request_as_student',true);
        }else{
            session()->remove('already_request_as_student');
        }

         //set session
         $StudentCount = Student::find(session('user.id'))->StudentCount();

         session()->put('student_count',$StudentCount);


        if(session('user.student') == null) return redirect()->route('user.request_as_student');

        return view('partial.student.dashboard2');
    }
   

    public function index()
    {

        define('USER_TYPE', session('user.usertype.type.name'));
        
        switch(USER_TYPE)
        {
            case 'Admin' : 
                return redirect()->route('admin.index');

            case 'Teacher' : 
                return redirect()->route('teacher.index');

            case 'User' : 
                return redirect()->route('user.test');

        }

        return view('partial.student.dashboard');
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

    public function logout(){
        session()->flush();

        return redirect()->route('register');
    }

    public function request_student()
    {
        //set session
        $StudentCount = Student::find(session('user.id'))->StudentCount();

        session()->put('student_count',$StudentCount);

        if(session()->has('already_request_as_student')) return redirect()->route('user.viewprofile');

        $majors = Major::all();
        return view('partial.student.RequestAsStudent',compact('majors'));
    }

    public function store_request_student(Request $request)
    {
        $request->validate([

            'phone' =>'required',
            'user_id' => 'required|numeric',
            'email' => 'required|email',
            'name' => 'required|min:2',
            'major_id' => 'required|numeric',
            'sex' => 'required|numeric',
            'campus_id' => 'required|numeric',
            'shift_id' => 'required|numeric',
            'dob' => 'required|date',
            'pob' => 'required'

        ]);

        RequestStudent::create([
            'user_id' => $request->user_id,
            'phone' => $request->phone,
            'name' => $request->name,
            'email' =>$request->name,
            'major_id' => $request->major_id,
            'is_accepted' =>0 ,
            'sex' =>$request->sex,
            'pob' =>$request->pob ,
            'dob' => $request->dob,
            'shift_id' =>$request->shift_id,
            'campus_id' =>$request -> campus_id 
        ]);

        session()->put('already_request_as_student',true);

        return redirect()->route('user.viewprofile')->with('message','Sent Request successfully');
        
    }
}

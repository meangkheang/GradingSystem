<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    

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

        return view('partial.teacher.dashboard');
        
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

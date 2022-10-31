<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use App\Traits\CheckUser;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
}

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IdentifyUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){

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
});

Route::group([],function(){
    
    //login route
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'store'])->name('login.user');

    
    //register route
    Route::get('/register',[RegisterController::class,'index'])->name('register');
    Route::post('/post',[RegisterController::class,'store'])->name('create.user');


    //logout route
    Route::get('/logout',[UserController::class,'logout'])->name('logout');


});


Route::group([],function(){

    Route::group(['prefix' => 'admin','as' => 'admin.'],function(){
        Route::get('/',[AdminController::class,'index'])->name('index');

    });

    
    Route::group(['prefix' => 'teacher','as' => 'teacher.','middleware' => 'identify'],function(){

        Route::get('/',[TeacherController::class,'index'])->name('index');
        Route::get('/students',[TeacherController::class,'students'])->name('students');
        Route::get('/grading',[TeacherController::class,'grading'])->name('grading');
        Route::get('/score',[TeacherController::class,'score'])->name('score');

    });

    
    Route::group(['prefix' => 'user', 'as' => 'user.' ,'middleware' => 'identify'],function(){

        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/subjects',[UserController::class,'test'])->name('test');

    });
});
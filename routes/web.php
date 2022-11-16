<?php

use App\Http\Controllers\Admin\ClassController;
use App\Models\User;
use App\Http\Middleware\IdentifyUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegisterController;

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
        default : 
            return redirect()->route('login');
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
        Route::get('/users',[AdminController::class,'users'])->name('users');
        Route::get('/request_students',[AdminController::class,'request_students'])->name('request_students');
        Route::post('/request_students',[AdminController::class,'store_request_students'])->name('store_request_students');
        Route::get('/teachers',[AdminController::class,'teachers'])->name('teachers');


        Route::group(['prefix' => 'classes' , 'as' => 'classes.'],function(){

            Route::get('/add_student',[\App\Http\Controllers\Admin\ClassController::class,'add_student_view'])->name('add_student_view');
            Route::get('/',[\App\Http\Controllers\Admin\ClassController::class,'index'])->name('index');
            Route::get('/create',[\App\Http\Controllers\Admin\ClassController::class,'create'])->name('create');
            Route::post('/create',[\App\Http\Controllers\Admin\ClassController::class,'store'])->name('store');

        });
        


        //users route
        Route::group(['prefix' => 'users' , 'as' => 'users.'],function(){

            Route::get('/show/{user}',[\App\Http\Controllers\Admin\UsersController::class,'show'])->name('show');
            Route::get('/edit/{user}',[\App\Http\Controllers\Admin\UsersController::class,'edit'])->name('edit');
            Route::post('/edit',[\App\Http\Controllers\Admin\UsersController::class,'store'])->name('store');
        });


    });

    
    Route::group(['prefix' => 'teacher','as' => 'teacher.','middleware' => 'identify'],function(){

        Route::get('/',[TeacherController::class,'index'])->name('index');
        Route::get('/students',[TeacherController::class,'students'])->name('students');
        Route::get('/grading',[TeacherController::class,'grading'])->name('grading');
        Route::get('/score',[TeacherController::class,'score'])->name('score');
        Route::get('/student/print/option/{id}',[TeacherController::class,'print_option'])->name('printing_option');
        Route::get('/student/print/{id}',[TeacherController::class,'printing'])->name('printing');
    });

    
    Route::group(['prefix' => 'user', 'as' => 'user.' ,'middleware' => 'identify'],function(){

        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/subjects',[UserController::class,'test'])->name('test');
        Route::get('/viewscore',[UserController::class,'view_score'])->name('view_score');
        Route::get('/request_student',[UserController::class,'request_student'])->name('request_as_student');
        Route::get('/viewprofile',[UserController::class,'viewprofile'])->name('viewprofile');
        Route::post('/request_student',[UserController::class,'store_request_student'])->name('store.request_as_student');


        Route::group(['prefix' => 'class','as' => 'class.'],function(){

            Route::get('/',[\App\Http\Controllers\User\ClassController::class,'index'])->name('index');
            Route::post('/',[\App\Http\Controllers\User\ClassController::class,'store'])->name('store');

        });

    });
});
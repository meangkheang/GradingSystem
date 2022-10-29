<?php

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});

//Teacher Route:
Route::get('/', function () {
    return view('partial.teacher.dashboard');
});

Route::get('/students', function () {
    return view('partial.teacher.students');
});

Route::get('/grading', function () {
    return view('partial.teacher.grading');
});

Route::get('/score', function () {
    return view('partial.teacher.score');
});

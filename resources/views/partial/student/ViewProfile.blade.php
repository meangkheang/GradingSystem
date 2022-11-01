@extends('layout')
@section('content')
   
@if(session('user.student') == null)
<h1 class="px-4 py-2 rounded bg-indigo-700 text-white">Wait Admin Accept First</h1>
    
@endif

{{-- student info --}}
@if(session('user.student') != null)
    <div class="px-4 py-2">
        <h1 class="border-b-w pb-5 text-lg font-semibold">Student's Profile</h1>

        <h1>Name : {{ session('user.student.name') }}</h1><br>
        <h1>Phone : {{ session('user.student.phone') }}</h1><br>
        <h1>Email : {{ session('user.student.email') }}</h1><br>
        <h1>Major : {{ session('user.student.major.name') }}</h1><br>
        <h1>Gender : {{ session('user.student.sex') == 1 ? 'Male' : 'Female' }}</h1><br>
        <h1>Shift : {{ session('user.student.shift.name') }}</h1><br>
        <h1>Campus : {{ session('user.student.campus.name') }}</h1><br>
        <h1>Date of birth : {{ session('user.student.dob') }}</h1><br>
        <h1>Place of birth : {{ session('user.student.pob') }}</h1><br>


    </div>
@endif


@endsection
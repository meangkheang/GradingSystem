@extends('layout')
@section('content')
    
@if (session()->has('error'))
    <div class="px-4 py-2 rounded bg-red-600 text-white w-full">{{ session('error') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="px-4 py-2 rounded bg-red-600 text-white w-full">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="shadow h-[20vh]" method="POST" action="{{ route('user.class.store') }}">
    @csrf
    <input type="hidden" value="{{ session('user.id') }}" name="user_id">


    <div class="border-b-2 w-full p-4">
        <strong><em>Join Class</em></strong>
    </div>

    <div class="mt-8 text-center">
        <label for=""><em>Class Tag</em></label>
        <input type="text" class="ml-2 px-4 py-2.5 rounded w-1/3" name="class_tag">
        <button type="submit" class="hover:bg-indigo-400 px-8 py-2.5 rounded bg-indigo-500 text-white ">Join</button>
    </div>

</form>

@endsection
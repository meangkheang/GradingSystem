@extends('layout')
@section('content')
    
<form class="shadow h-[20vh]" method="POST" action="{{ route('user.class.store') }}">
    @csrf

    <div class="border-b-2 w-full p-4">
        Header
    </div>

    <div class="mt-8 text-center">
        <label for=""><em>Class Tag</em></label>
        <input type="text" class="ml-2 px-4 py-2.5 rounded w-1/3" name="class_tag">
        <button type="submit" class="hover:bg-indigo-400 px-8 py-2.5 rounded bg-indigo-500 text-white ">Join</button>
    </div>

</form>

@endsection
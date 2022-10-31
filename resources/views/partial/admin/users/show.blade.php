@extends('layout')
@section('content')

<div class="p-8 mx-auto border shadow">

    <div class="flex justify-between items-center border-b-2 pb-4 ">
        <div>
            <h1 class="font-bold text-xl"><em>View User</em></h1>
        </div>
        <a href="{{ route("admin.users") }}" class="hover:underline cursor-pointer">Back</a>
    </div>
   


    <div class="mt-8 text-center">
        <h1 class="font-bold text-xl"><em>User Profile</em></h1>
        <img class="pt-4 inline-block w-24" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="profile.png">
        <p class="px-32 py-4 text-sm font-thin">Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
    </div>

    <div class="mt-8 text-center">

        <div class="w-1/2 mx-auto mb-4">
            <label for="" class="float-left font-bold"><em>Name</em></label><br>
            <input type="text" class="w-full px-4 py-2 rounded " disabled value="{{ $user->name }}">
        </div>

        <div class="w-1/2 mx-auto mb-4">
            <label for="" class="float-left font-bold"><em>Email</em></label><br>
            <input type="text" class="w-full px-4 py-2 rounded " disabled value="{{ $user->email }}">
        </div>


        <div class="w-1/2 mx-auto mb-4">
            <label for="" class="float-left font-bold"><em>Type</em></label><br>
            <input type="text" class="w-full px-4 py-2 rounded " disabled value="{{ $user->usertype->type->name }}">
        </div>

        <div class="w-1/2 mx-auto mb-4">
            <label for="" class="float-left font-bold"><em>Create at</em></label><br>
            <input type="text" class="w-full px-4 py-2 rounded " disabled value="{{ $user->created_at }}">
        </div>

        <div class="w-1/2 mx-auto mb-4">
            <label for="" class="float-left font-bold"><em>Update at</em></label><br>
            <input type="text" class="w-full px-4 py-2 rounded " disabled value="{{ $user->updated_at }}">
        </div>


    </div>
</div>
   

@endsection

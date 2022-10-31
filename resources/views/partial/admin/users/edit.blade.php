@extends('layout')
@section('content')
    <div class="p-8 mx-auto border shadow">

        <div class="flex justify-between items-center border-b-2 pb-4 ">
            <div>
                <h1 class="font-bold text-xl"><em>Edit User</em></h1>
            </div>
            <a href="{{ route('admin.users') }}" class="hover:underline cursor-pointer">Back</a>
        </div>

        {{-- erros handler --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="px-4 py-2 rounded bg-red-600 text-white w-full mb-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="px-4 py-2 rounded bg-green-600 text-white w-full mb-2">{{ session('message') }}</div>
        @endif


        <div class="mt-8 text-center">
            <h1 class="font-bold text-xl"><em>User Profile</em></h1>
            <img class="pt-4 inline-block w-24" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                alt="profile.png">
            <p class="px-32 py-4 text-sm font-thin">Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
        </div>

        <form class="mt-8 text-center" method="post" action="{{ route('admin.users.store') }}">

            <div class="w-1/2 mx-auto mb-4">
                <label for="" class="float-left font-bold"><em>Name</em></label><br>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    value="{{ $user->name }}" name="name">
            </div>

            <div class="w-1/2 mx-auto mb-4">
                <label for="" class="float-left font-bold"><em>Email</em></label><br>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    value="{{ $user->email }}" name="email">
            </div>


            <div class="w-1/2 mx-auto mb-4">
                <label for="" class="float-left font-bold"><em>Type</em></label><br>
                <select id="shift" wire:model.debounce.100ms="type" name="type_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">
                    <option {{ $user->usertype->type->name == 'Admin' ? 'selected' : '' }} value="1">Admin</option>
                    <option {{ $user->usertype->type->name == 'Teacher' ? 'selected' : '' }} value="2">Teacher</option>
                    <option {{ $user->usertype->type->name == 'User' ? 'selected' : '' }} value="3">User</option>
                </select>
            </div>


            @csrf
            <button type="submit"
                class="px-4 py-2 rounded-lg w-24 hover:bg-indigo-600 bg-indigo-800 text-white">Save</button>



        </form>
    </div>
@endsection

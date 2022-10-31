@extends('layout')
@section('content')

<div>

    <div class="flex justify-between  px-8 py-2">
        <div>
            <h1 class="font-bold text-lg">
                <em>Requested Student </em>
            </h1>
        </div>
        <div>

            <a href="{{ route('admin.index') }}"
                class="px-4 rounded hover:bg-indigo-800 text-sm py-2 text-white bg-indigo-600 inline-block cursor-pointer">Back</a>

        </div>
    </div>

    @if (session()->has('message'))
        <div class="px-4 py-2 rounded mb-2 bg-green-600 text-white w-full">{{ session('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger w-1/2 mx-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="px-4 py-2 rounded mb-2 bg-red-600 text-white w-full">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="border-t-2 mt-2 p-8">

     
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">User</th>
                    <th class="py-3 px-6 text-left">Student Name</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Major</th>
                    <th class="py-3 px-6 text-left">Sex</th>
                    <th class="py-3 px-6 text-left">Date of birth</th>
                    <th class="py-3 px-6 text-left">Place of birth</th>
                    <th class="py-3 px-6 text-left">Campus</th>
                    <th class="py-3 px-6 text-left">Shift</th>
                    <th class="py-3 px-6 text-left">Is_Accepted</th>
                    
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">

                <form action="{{ route('admin.store_request_students') }}" id="form" method="POST">
                    @csrf

                @foreach ($requested_as_students as $student)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $student->user->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $student->phone }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->email }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->major->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->sex  == 1 ? 'M' : 'F'  }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->dob }}</span>
                        </div>
                    </td>
                    
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->pob }}</span>
                        </div>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->campus->name }}</span>
                        </div>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->shift->name}}</span>
                        </div>
                    </td>

                    <td class="py-3 px-6 text-center">

                            <div class="flex items-center">
                                <input name="is_accepted[]" value="{{ $student->id }}" type="checkbox" class="font-medium " {{ $student->is_accepted == 1 ? 'checked' : '' }}/>
                            </div>
                    </td>
                  
                </tr>
                @endforeach
            </form>

            </tbody>
        </table>

        <div class="flex w-full justify-end">
            <button  class="bg-indigo-800 my-4  rounded px-4 py-2 text-white hover:bg-indigo-600" onclick="document.getElementById('form').submit();">Save</button>

        </div>

    </div>

</div>

@endsection

@extends('layout')
@section('content')
    
@if (session()->has('message'))
    <div class="px-4 py-2 rounded bg-green-600 text-white w-full">
        {{ session('message') }}
    </div>

@endif

<div>

    <div class="flex justify-between  px-8 py-4">
        <div>
                <h1 class="font-bold text-lg">
                    Subject : (1)

                </h1>
        </div>
    </div>

    <div class="border-t-2 mt-4 p-8">

        <table class="min-w-max w-full table-auto mt-4">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Subject Name</th>
                    <th class="py-3 px-6 text-left">SHIFT</th>
                    <th class="py-3 px-6 text-left">TEACHER</th>
                    <th class="py-3 px-6 text-left">STUDENTs</th>
                    <th class="py-3 px-6 text-left">FEMALE</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">C#</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">Evening</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium">Pen Narong</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">15</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">3</span>
                        </div>
                    </td>
                   

                   
                    
                </tr>
            </tbody>
        </table>
        
        
        
    </div>

</div>


@endsection

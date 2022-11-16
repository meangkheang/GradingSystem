@extends('layout')
@section('content')

<div class=" my-6 rounded-lg border z-10 overflow-hidden">
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Phone</th>
                <th class="py-3 px-6 text-left">Sex</th>
                <th class="py-3 px-6 text-left">Created at</th>
                <th class="py-3 px-6 text-left">Updated at</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($students  as $student)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $student->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->email }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->phone }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $student->sex == 1 ? 'Male' : 'Female' }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->created_at->diffForHumans() }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->updated_at->diffForHumans() }}</span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection

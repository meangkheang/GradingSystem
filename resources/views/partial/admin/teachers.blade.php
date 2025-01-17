@extends('layout')
@section('content')

<div class=" my-6 rounded-lg border z-10 overflow-hidden">
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Role</th>
                <th class="py-3 px-6 text-left">Created at</th>
                <th class="py-3 px-6 text-left">Updated at</th>
                <th class="py-3 px-6 text-left">Action</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($teachers  as $teacher)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $teacher->user->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $teacher->user->email }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $teacher->type->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $teacher->created_at->diffForHumans() }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $teacher->updated_at->diffForHumans() }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center gap-2">
                            <a href="#" class="bg-blue-400 px-4 py-1 text-white cursor-pointer font-medium ">View</a>
                            <a href="#" class="bg-indigo-800 px-4 py-1 text-white cursor-pointer font-medium ">Edit</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection

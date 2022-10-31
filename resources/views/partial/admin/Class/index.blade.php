@extends('layout')
@section('content')
    <div>

        <div class="flex justify-between  px-8 py-2">
            <div>
                <h1 class="font-bold text-lg">
                    Classes

                </h1>
            </div>
            <div>

                <a href="{{ route('admin.classes.create') }}"
                    class="px-4 rounded hover:bg-indigo-800 text-sm py-2 text-white bg-indigo-600 inline-block cursor-pointer">New
                    Class</a>

            </div>
        </div>

        @if (session()->has('message'))
            <div class="px-4 py-2 rounded bg-green-600 text-white w-full">
                {{ session('message') }}
            </div>
        @endif

        <div class="border-t-2 mt-2 p-4">

            <table class="min-w-max w-full table-auto mt-4">
                <thead>
                    <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Class Name</th>
                        <th class="py-3 px-6 text-left">Tag</th>
                        <th class="py-3 px-6 text-left">Year</th>
                        <th class="py-3 px-6 text-left">Batch</th>
                        <th class="py-3 px-6 text-left">Teacher</th>
                        <th class="py-3 px-6 text-left">Shift</th>
                        <th class="py-3 px-6 text-left">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $class->subject->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span class="font-medium ">{{ $class->class_tag }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $class->year }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span class="font-medium ">{{ $class->bach }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span class="font-medium ">{{ $class->teacher()->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span class="font-medium ">{{ $class->shift->name }}</span>
                                </div>
                            </td>


                            <td class="py-3 px-6 flex gap-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="#"
                                        class="bg-blue-400 px-4 py-1 text-white cursor-pointer font-medium ">View</a>
                                    <a href="#"
                                        class="bg-indigo-800 px-4 py-1 text-white cursor-pointer font-medium ">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
@endsection

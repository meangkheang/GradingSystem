@extends('layout')
@section('content')
    <div>

        <div class="flex justify-between  px-8 py-2">
            <div>
                <h1 class="font-bold text-lg">
                    Create Class

                </h1>
            </div>
            <div>

                <a href="{{ route('admin.classes.index') }}"
                    class="px-4 rounded hover:bg-indigo-800 text-sm py-2 text-white bg-indigo-600 inline-block cursor-pointer">Back</a>

            </div>
        </div>


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


            <form action="{{ route('admin.classes.store') }}" method="POST">
                @csrf


                <div class="w-full mx-auto mb-4 flex justify-between gap-3">
                    <div class="w-1/2 mx-auto mb-4">
                        <label for="" class="float-left font-bold"><em>Bach</em></label><br>
                        <input type="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            value="" name="bach">
                    </div>

                    <div class="w-1/2 mx-auto mb-4">
                        <label for="" class="float-left font-bold"><em>Name</em></label><br>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            value="" name="name">
                    </div>
                </div>


                <div class="w-full mx-auto mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="" class="float-left font-bold"><em>Subject</em></label><br>
                        <select id="shift" name="subject_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">

                            @foreach ($subjects as $subject )
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach

                          

                        </select>
                    </div>


                    <div class="w-1/2">
                        <label for="" class="float-left font-bold"><em>Teacher</em></label><br>
                        <select id="shift" name="teacher_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">
                            @foreach ($teachers as $teacher )
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>


                <div class="w-full mx-auto mb-4 flex justify-between gap-3">
                    <div class="w-1/2">
                        <label for="" class="float-left font-bold"><em>Shift </em></label><br>
                        <select id="shift" name="shift_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">

                            @foreach ($shifts as $shift )
                            <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="w-1/2 mx-auto mb-4">
                        <label for="" class="float-left font-bold"><em>Year</em></label><br>
                        <input type="number"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            value="" name="year">
                    </div>
                  
                </div>

                <button type="submit" class="bg-indigo-800 hover:bg-indigo-600 text-white px-4 py-2 rounded">Submit</button>
            </form>


        </div>

    </div>
@endsection

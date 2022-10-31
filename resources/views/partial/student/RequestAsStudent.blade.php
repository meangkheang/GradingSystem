@extends('layout')
@section('content')

    <form class="" method="POST" action="{{ route('user.store.request_as_student') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ session('user.id') }}">
        <h1 class="text-lg font-bold text-center">Form Request</h1>


        @if ($errors->any())
            <div class="alert alert-danger w-1/2 mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="px-4 py-2 rounded mb-2 bg-red-600 text-white w-full">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="w-1/2 shadow p-8 mx-auto mt-2">


            <div class="w-full mx-auto mb-4">
                <label for="" class="float-left font-bold"><em>Phone Number</em></label><br>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    value="" name="phone">
            </div>
            <div class="w-full mx-auto mb-4">
                <label for="" class="float-left font-bold"><em>Full Name</em></label><br>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    value="" name="name">
            </div>

            <div class="w-full mx-auto mb-4">
                <label for="" class="float-left font-bold"><em>Email</em></label><br>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                    value="" name="email">
            </div>


            <div class="w-full mx-auto mb-4 flex justify-between gap-3">
                <div class="w-1/2">
                    <label for="" class="float-left font-bold"><em>Major <span class="text-sm font-thin">(not
                                complted version yet )</span></em></label><br>
                    <select id="shift" name="major_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">

                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="w-1/2">
                    <label for="" class="float-left font-bold"><em>Sex</em></label><br>
                    <select id="shift" name="sex"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">

                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>

            <div class="w-full mx-auto mb-4 flex justify-between gap-3">
                <div class="w-1/2">
                    <label for="" class="float-left font-bold"><em>Campus </em></label><br>
                    <select id="shift" name="campus_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">

                        <option value="1">UC1</option>
                        <option value="2">UC2</option>

                    </select>
                </div>


                <div class="w-1/2">
                    <label for="" class="float-left font-bold"><em>Shift</em></label><br>
                    <select id="shift" name="shift_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">

                        <option value="1">Morning</option>
                        <option value="2">Afternoon</option>
                        <option value="3">Evening</option>

                    </select>
                </div>
            </div>


            <div class="w-full mx-auto mb-4 flex justify-between gap-3">

                <div class="w-1/2 mx-auto mb-4">
                    <label for="" class="float-left font-bold"><em>Date of birth</em></label><br>
                    <input type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        value="" name="dob">
                </div>


                <div class="w-1/2">
                    <label for="" class="float-left font-bold"><em>Place of birth</em></label><br>
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                        value="" name="pob">
                </div>
            </div>

            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded text mx-auto">Submit</button>

        </div>

    </form>

@endsection

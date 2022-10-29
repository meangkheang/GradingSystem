@extends('layout')
@section('content')
    {{-- header --}}
    <form action="#" method="GET" class="lg:block">@csrf
        <div class="mt-2 relative flex lg:w-[32rem] gap-2">
            <select id="campus"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option selected>Choose a campus</option>
                <option value="1">UC1</option>
                <option value="2">UC2</option>
            </select>
            <select id="shift"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option selected>Choose shift</option>
                <option value="Morning">Morning</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
            </select>
        </div>
        <div class="mt-2 relative lg:w-64">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" name="email" id="topbar-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Search Student">
        </div>
    </form>
    {{-- table --}}
    <div class=" my-6 rounded-lg border z-10 overflow-x-scroll">
        <table class="min-w-max w-full table-fixed">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Student</th>
                    <th class="py-3 px-6 text-left w-[5%]">Sex</th>
                    <th class="py-3 px-6 text-left">Class Participation</th>
                    <th class="py-3 px-6 text-left">HW/Quiz</th>
                    <th class="py-3 px-6 text-left">Mid-Term</th>
                    <th class="py-3 px-6 text-left">Slide Handbook</th>
                    <th class="py-3 px-6 text-left">Major Assignment</th>
                    <th class="py-3 px-6 text-left">Presentation</th>
                    <th class="py-3 px-6 text-left">Final</th>
                    <th class="py-3 px-6 text-left">Total</th>
                    <th class="py-3 px-6 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <form action="" method="">
                    @csrf
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">Pheap PorPor</span>
                            </div>
                        </td>
                        <td class="py-3 pl-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">M</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="cp"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="hw"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="mid"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="book"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="ass"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="present"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="final"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <input name="total" id="total"
                                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-normal sm:text-lg rounded-lg focus:border-blue-500 block w-full p-2">
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <button type="submit"
                                    class="font-medium bg-green-500 rounded-lg text-white hover:text-gray-200 hover:bg-green-700 p-2">Done</button>
                            </div>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
@endsection

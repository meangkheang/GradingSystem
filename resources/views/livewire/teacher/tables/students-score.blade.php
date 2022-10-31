<div>

    {{-- header --}}
    <form action="#" method="GET" class="lg:block">@csrf
        <div class="mt-2 relative flex lg:w-full gap-2 justify-between ">

            <div class="w-1/2 flex gap-4">
                <select id="campus" wire:model.debounce.200ms ="campus"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <option selected value="1">UC1</option>
                    <option value="2">UC2</option>
                </select>
                <select id="shift" wire:model="shift"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <option selected value="1">Morning</option>
                    <option value="2">Afternoon</option>
                    <option value="3">Evening</option>
                </select>

                <select id="shift" wire:model.debounce.200ms ="grade"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option selected value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>

            </select>

            </div>


            {{-- <h1 class=" text-lg">Course : Name</h1> --}}

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
            <input type="text" name="email" id="topbar-search" wire:model.debounce.500ms ="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Search Student">
        </div>
    </form>

    {{-- table --}}

    <div class=" my-6 rounded-lg border z-10 overflow-x-scroll">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Student</th>
                    <th class="py-3 px-6 text-left">Sex</th>
                    <th class="py-3 px-6 text-left">Class Participation</th>
                    <th class="py-3 px-6 text-left">HW/Quiz</th>
                    <th class="py-3 px-6 text-left">Mid-Term</th>
                    <th class="py-3 px-6 text-left">Slide Handbook</th>
                    <th class="py-3 px-6 text-left">Major Assignment</th>
                    <th class="py-3 px-6 text-left">Presentation</th>
                    <th class="py-3 px-6 text-left">Final</th>
                    <th class="py-3 px-6 text-left">Total</th>
                    <th class="py-3 px-6 text-left">Grade</th>
                    <th class="py-3 px-6 text-left">Shift</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">

                @foreach ($students as $student)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $student->student->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->student->sex == 1 ? 'M' : 'F' }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $student->class_participation }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->hw }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->midterm }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->slidehandbook }}</span>
                        </div>
                    </td>

                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->major_assignment }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->presentation }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->final }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <span class="font-medium ">{{ $student->total }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center">
                            <span class="font-medium text-green-500">{{ $student->score_subject->grade }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center">
                            <a href="#" class="font-medium hover:underline">{{ $student->student->shift->name }}</a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


        

    </div>

</div>

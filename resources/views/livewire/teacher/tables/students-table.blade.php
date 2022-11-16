<div>

    {{-- header --}}
    <form action="#" method="GET" class="lg:block">
        <div class="mt-2 relative flex lg:w-full gap-2 justify-between items-center">

            <div class="flex gap-2 w-1/2">
                <select id="campus" wire:model="select_class" wire:model = 'select_class'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    @foreach ($classes as $class)
                        <option value="{{ $class->class_tag }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                <select id="campus" wire:model="campus_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <option selected value="1">UC1</option>
                    <option value="2">UC2</option>
                </select>
                <select id="shift"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    wire:model="shift_id">
                    <option selected value="1">Morning</option>
                    <option value="2">Afternoon</option>
                    <option value="3">Evening</option>
                </select>

            </div>


            <a class="hover:bg-gray-400 cursor-pointer text-sm px-4 py-2 rounded bg-indigo-600 text-white">Add New</a>
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
            <input wire:model.debounce.300ms="search" type="text" name="email" id="topbar-search"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Search Student">
        </div>
    </form>

    {{-- table --}}

    <div class=" my-6 rounded-lg border z-10 overflow-hidden">
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Student</th>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Sex</th>
                    <th class="py-3 px-6 text-left">Campus</th>
                    <th class="py-3 px-6 text-left">Shift</th>
                    <th class="py-3 px-6 text-left">DOB</th>
                    <th class="py-3 px-6 text-left">POB</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Email</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($students as $student)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $student->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $student->student_id }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $student->sex == 1 ? 'Male' : 'Female' }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $student->campus->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $student->getShiftWithClassTag($select_class) }}</span>
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
                                <span class="font-medium ">{{ $student->phone }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $student->email }}</span>
                            </div>
                        </td>

                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>


    </div>

</div>

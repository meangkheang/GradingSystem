<div>
    <div class="flex justify-between items-center px-8 ">
        <div>
            <h1 class="font-bold text-lg">
                Subject : {{ count($classes) }}

            </h1>
        </div>

        @if (session('user.student') != null)
            <div>
                <button class="px-4 py-2 rounded bg-indigo-600 text-white" wire:click="RedirectToJoinClassRoute">Join
                    Class</button>
            </div>
        @endif


    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="px-4 py-2 rounded bg-red-600 text-white w-full">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="border-t-2 mt-4 p-8">

        <table class="min-w-max w-full table-auto mt-4 ">
            <thead>
                <tr class="bg-gray-200 overflow-hidden text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Class Name</th>
                    <th class="py-3 px-6 text-left">Subject Name</th>
                    <th class="py-3 px-6 text-left">SHIFT</th>
                    <th class="py-3 px-6 text-left">TEACHER</th>
                    <th class="py-3 px-6 text-left">STUDENTs</th>

                </tr>
            </thead>
            <tbody>
                
                

                @forelse ($classes as $class)
                
                
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $class->subject_class->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $class->subject_class->subject->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $class->subject_class->shift->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $class->subject_class->teacher()->name }} </span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $class->subject_class->total_student() }}</span>
                            </div>
                        </td>
                     

                    </tr>
                @empty

                <td colspan="6">
                    <div class="text-center px-4 py-2 rounded bg-indigo-500 text-white w-fulls">No class yet</div>
                </td>

                @endforelse

            </tbody>
        </table>

    </div>
</div>

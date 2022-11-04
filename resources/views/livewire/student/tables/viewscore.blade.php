<div>

    <div class="flex justify-between  px-8 py-4">
        <div>
            <h1 class="font-bold text-lg">
                View Score

            </h1>
        </div>
    </div>



    <div class="border-t-2 mt-4 p-8 overflow-x-scroll">

        <div class="w-1/2">
            <label for="" class="float-left font-bold"><em>Select Subject</em></label><br>
            <select id="shift" name="sex" wire:model="class_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 pl-10">
                @forelse ($subjects as $subject)
                    <option value="{{ $subject->class_tag }}">{{ $subject->subject_class->subject->name }}</option>
                @empty
                    <option value="0" value="">None</option>
                @endforelse
            </select>
        </div>

        <table class="min-w-max w-full table-auto mt-4 ">
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
            <tbody>
                @if ($score != null)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $score->student->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->student->sex == 1? 'M' : 'F' }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $score->class_participation }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->hw }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->midterm }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->slidehandbook }}</span>
                            </div>
                        </td>

                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->major_assignment }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->presentation }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->final }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center">
                                <span class="font-medium ">{{ $score->total }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-medium text-green-500">{{ $score->score_subject }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <a href="#" class="font-medium hover:underline">{{ $score->score_subject->class->shift->name }}</a>
                            </div>
                        </td>
                    </tr>
                
                @else

                <td colspan="14" class="text-lg text-center px-4 py-2  text-black">This subject not score yet !!</td>

                @endif

            </tbody>
        </table>

    </div>

</div>

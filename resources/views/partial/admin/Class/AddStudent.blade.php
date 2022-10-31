@extends('layout')
@section('content')

<div>

    <div class="flex justify-between  px-8 py-2 border-b">
        <div>
            <h1 class="font-bold text-lg">
                Add Student

            </h1>
        </div>
        <div>
            <a href="{{ route('admin.classes.index') }}"
                class="px-4 rounded hover:bg-indigo-800 text-sm py-2 text-white bg-indigo-600 inline-block cursor-pointer">Back</a>

        </div>
    </div>

</div>

@endsection
@extends('layout')
@section('content')
    
@if (session()->has('message'))
    <div class="px-4 py-2 rounded bg-green-600 text-white w-full">
        {{ session('message') }}
    </div>

@endif

<livewire:student.tables.dashboard/>


@endsection

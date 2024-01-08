@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route ('groups.addToGroup', ['group'=>$groups->id]) }}" class="inline-flex items-center mb-10 px-3 py-2 text-sm font-medium text-center text-white bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
        <svg class="w-3.5 h-3.5 me-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
        </svg>
        Dodaj
    </a>
    <a href="{{ route ('groups.index') }}" class=" float-right inline-flex items-center mb-10 px-3 py-2 text-sm font-medium text-center text-white bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
        <svg class="rotate-180 w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
        Zawróć
    </a>
</div>
<div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-700">
    <h5 class="mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Grupa</h5>
    <p class="mb-3 font-normal text-gray-100 ">Nazwa grupy: {{ $groups->group_name}}</p>
    <p class="mb-3 font-normal text-gray-100">Ilość studentów: {{ $groups->group_name}}</p>
    <!-- TO DO -->
    <!-- lista studentów nalezaca do grupy -->
</div>
@endsection
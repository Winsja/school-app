@extends('layouts.app')
@section('content')
<div class="text-right">
    <a href="{{ route ('lessons.index') }}" class="inline-flex items-center mb-10 px-3 py-2 text-sm font-medium text-center text-white bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
        <svg class="rotate-180 w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
        Zawróć
    </a>
</div>

<div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-700">
    <h5 class="mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Utwórz zajęcia</h5>

    <form action="{{ route('lessons.store') }}" method="post" class="max-w-sm">
        {!! csrf_field() !!}
        <div class="mb-5">
            <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grupa</label>
            <select name="group_id" id="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                @foreach($groups as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Przedmiot</label>
            <select name="subject_id" id="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                @foreach($subjects as $id => $name)
                <option value="{{ $id}}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="lesson_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data</label>
            <input type="date" name="lesson_date" id="lesson_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
            @error('lesson_date')
            <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-800 dark:hover:bg-gray-700">Dodaj</button>
    </form>

</div>
@endsection
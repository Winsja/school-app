@extends('layouts.app')
@section('content')

@if(Auth::user()->role == 'Nauczyciel')
@elseif(Auth::user()->role == 'Admin')
<div class="flex justify-evenly mt-16">
    <a href="{{ route('teachers.index')}}" class="w-1/3 mx-10">
        <div class="min-w-300 max-w-xl p-16 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center gap-y-5">
            <svg class="h-12 w-12 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path>
            </svg>
            <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Wykładowcy</h5>
        </div>
    </a>
    <a href="{{ route('subjects.index')}}" class="w-1/3 mx-10">
        <div class="max-w-xl p-16 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center gap-y-5">
            <svg class="h-12 w-12 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                <path fill="currentColor" d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
            </svg>
            <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Przedmioty</h5>
        </div>
    </a>
    <a href="{{ route('groups.index')}}" class="w-1/3 mx-10">
        <div class="max-w-xl p-16 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center gap-y-5">
            <svg class="w-12 h-12 text-white" aria-hidden=true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                <path fill="currentColor" d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                <path fill="currentColor" d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
            </svg>
            <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Grupy</h5>
        </div>
    </a>
</div>
<div class="flex justify-evenly mt-16">
    <a href="{{ route('students.index')}}" class="w-1/3 mx-10">
        <div class="min-w-300 max-w-xl p-16 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center gap-y-5">
            <svg class="h-12 w-12 text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-graduate" class="svg-inline--fa fa-user-graduate fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z"></path>
            </svg>
            <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Studenci</h5>
        </div>
    </a>
    <a href="{{ route('users.index')}}" class="w-1/3 mx-10">
        <div class="max-w-xl p-16 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center gap-y-5">
            <svg class="w-12 h-12 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path fill="currentColor" d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
            </svg>
            <h5 class="mb-2 text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">Konta użytkowników</h5>
        </div>
    </a>

</div>
@elseif(Auth::user()->role == 'Student')
@else
<p>NIC</p>
@endif

@endsection
@extends('layouts.app')
@section('content')
<div class="text-right">
    <a href="{{ route ('gradesTeacher.index') }}" class="inline-flex items-center mb-10 px-3 py-2 text-sm font-medium text-center text-white bg-gray-800 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
        <svg class="rotate-180 w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
        Zawróć
    </a>
</div>
<div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-600 dark:border-gray-700">
    <h5 class="mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Edytuj oceny</h5>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <!-- TU -->

        <form action="{{ route('gradesTeacher.update', ['gradesTeacher'=>$students[0]->lesson_id]) }}" method="post" class="w-full">
            {!! csrf_field() !!}
            @method("PATCH")

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Imie Nazwisko
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ocena
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Wybierz ocenę
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class=" px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->grade }}
                        </td>
                        <td class="px-6 py-4">
                            <select name="grade[{{ $item->id }}]" id="">
                                <option value="" {{ $item->grade === null ? 'selected' : '' }}></option>
                                <option value="1" {{ $item->grade == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $item->grade == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $item->grade == 3 ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $item->grade == 4 ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $item->grade == 5 ? 'selected' : '' }}>5</option>
                                <option value="6" {{ $item->grade == 6 ? 'selected' : '' }}>6</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-800 dark:hover:bg-gray-700">Zapisz</button>

        </form>
    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $subjects = Subject::all();
        // return view('backend.subjects.index')->with('subjects', $subjects);
        $e = DB::table('subjects')->leftJoin('teachers', 'subjects.teacher_id', '=', 'teachers.id')
            ->selectRaw('subjects.name as s_name, subjects.id as s_id, teachers.name as t_name')
            ->get(['*']);
        return view('backend.subjects.index')->with('subjects', $e);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $teachers = Teacher::pluck('name', 'id');
        return view('backend.subjects.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => 'required|string|max:30',
        ]);
        $input = $request->all();
        Subject::create($input);
        return redirect('subjects')->with('flash_msg', 'Przedmiot został dodany!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $subjects = DB::table('subjects')->leftJoin('teachers', 'subjects.teacher_id', '=', 'teachers.id')
            ->where('subjects.id', '=', $id)
            ->selectRaw('subjects.name as s_name, subjects.id as s_id, teachers.name as t_name')
            ->get(['*']);
        return view('backend.subjects.show')->with('subjects', $subjects);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        // do zmiennej przypisz nazwe nauczyciela co pozwoli na wybranie z option->select
        $teachers = Teacher::pluck('name', 'id');
        $subjects = DB::table('subjects')->find($id);
        // return view('backend.subjects.edit')->with('subjects', $subjects);
        return view('backend.subjects.edit', compact('teachers', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name'     => 'required|string|max:30',
        ]);
        $subjects = Subject::find($id);
        $input = $request->all();
        $subjects->update($input);
        return redirect('subjects')->with('flash_msg', 'Zaktualizowano pomyślnie!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Subject::destroy(($id));
        return redirect('subjects')->with('flash_msg', 'Przedmiot został usunięty!');
    }
}

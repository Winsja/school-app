<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::all();
        return view('backend.teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // tehgo tpyu walidacja
        $request->validate([
            'phone'     => 'required|string|size:9',
            'name'     => 'required|string|max:30',
            'address'     => 'required|string|max:50'
        ]);

        $input = $request->all();
        Teacher::create($input);
        return redirect('teachers')->with('flash_msg', 'Wykładowca został dodany!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teachers = Teacher::find($id);
        return view('backend.teachers.show')->with('teachers', $teachers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers = DB::table('teachers')->find($id);
        return view('backend.teachers.edit')->with('teachers', $teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'phone'     => 'required|string|size:9',
            'name'     => 'required|string|max:30',
            'address'     => 'required|string|max:50'
        ]);

        $teachers = Teacher::find($id);
        $input = $request->all();
        $teachers->update($input);
        return redirect('$teachers')->with('flash_msg', 'Zaktualizowano pomyślnie!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_msg', 'Wykładowca został usunięty!');
    }
}
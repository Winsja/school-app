<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('backend.students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone'     => 'required|string|size:9',
            'name'     => 'required|string|max:30',
            'address'     => 'required|string|max:50'
        ]);

        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_msg', 'Student został dodany!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::find($id);
        return view('backend.students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $students = DB::table('students')->find($id);
        return view('backend.students.edit')->with('students', $students);
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

        $students = Student::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('$students')->with('flash_msg', 'Zaktualizowano pomyślnie!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::destroy($id);
        return redirect('students')->with('flash_msg', 'Student został usunięty!');
    }
}

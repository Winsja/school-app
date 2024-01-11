<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Kto zalogowany
        $student_id = DB::table('students')->where('name', '=', auth()->user()->name)->first();
        $attendance = DB::table('attendance')
            ->leftJoin('lessons', 'lessons.id', '=', 'attendance.lesson_id')
            ->leftJoin('students', 'attendance.student_id', '=', 'students.id')
            ->leftJoin('subjects', 'subjects.id', '=', 'lessons.subject_id')
            ->where('students.id', '=', $student_id->id)
            ->select('attendance.*', 'subjects.name as subject_name', 'lessons.lesson_date')
            ->get();

        return view('backendStudent.attendance.index')->with('attendance', $attendance);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

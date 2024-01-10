<?php

namespace App\Http\Controllers;

use App\Models\TeacherAttendanceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherAttendanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TO działa
        $teacher_id = DB::table('teachers')->where('name', '=', auth()->user()->name)->first();
        $attendance = DB::table('teachers')
            ->leftJoin('subjects', 'teachers.id', '=', 'subjects.teacher_id')
            ->leftJoin('lessons', 'subjects.id', '=', 'lessons.subject_id')
            ->leftJoin('groups', 'groups.id', '=', 'lessons.group_id')
            ->where('teachers.id', '=', $teacher_id->id)
            ->select('lessons.*', 'subjects.name as subject_name', 'groups.group_name as group_name')
            ->get();
        return view('backendTeacher.attendance.index')->with('attendance', $attendance);
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
        // $lesson_id = DB::table('attendance')->find($id);
        // $students = DB::table('attendance')
        //     ->leftJoin('students', 'attendance.student_id', '=', 'students.id')
        //     ->get();
        // return view('backendTeacher.attendance.edit')->with('attendance', $lesson_id);
        $lesson_id = DB::table('attendance')->where('id', $id)->first();

        $students = DB::table('attendance')
            ->where('attendance.lesson_id', '=', $id) // Assuming 'lesson_id' is the column in the 'attendance' table that references the lessons
            ->leftJoin('students', 'attendance.student_id', '=', 'students.id')
            ->get();

        return view('backendTeacher.attendance.edit')->with('attendance', $id)->with('students', $students);
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

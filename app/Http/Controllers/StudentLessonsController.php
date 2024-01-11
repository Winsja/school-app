<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Kto zalogowany
        $student_id = DB::table('students')->where('name', '=', auth()->user()->name)->first();
        $lessons = DB::table('lessons')
            ->leftJoin('groups', 'groups.id', '=', 'lessons.group_id')
            ->leftJoin('students_groups', 'students_groups.group_id', '=', 'groups.id')
            ->leftJoin('students', 'students_groups.student_id', '=', 'students.id')
            ->leftJoin('subjects', 'lessons.subject_id', '=', 'subjects.id')
            ->where('students.id', '=', $student_id->id)
            ->select('lessons.*', 'subjects.name as subject_name', 'groups.group_name as group_name')
            ->get();

        return view('backendStudent.lessons.index')->with('lessons', $lessons);
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

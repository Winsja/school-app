<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Kto zalogowany
        $student_id = DB::table('students')->where('name', '=', auth()->user()->name)->first();
        $groups = DB::table('groups')
            ->leftJoin('students_groups', 'students_groups.group_id', '=', 'groups.id')
            ->leftJoin('students', 'students_groups.student_id', '=', 'students.id')
            ->where('students.id', '=', $student_id->id)
            ->select('groups.group_name as group_name')
            ->get();

        return view('backendStudent.groups.index')->with('groups', $groups);
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

<?php

namespace App\Http\Controllers;

use App\Models\TeacherGrades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_id = DB::table('teachers')->where('name', '=', auth()->user()->name)->first();
        $grades = DB::table('teachers')
            ->leftJoin('subjects', 'teachers.id', '=', 'subjects.teacher_id')
            ->leftJoin('lessons', 'subjects.id', '=', 'lessons.subject_id')
            ->leftJoin('groups', 'groups.id', '=', 'lessons.group_id')
            ->where('teachers.id', '=', $teacher_id->id)
            ->select('lessons.*', 'subjects.name as subject_name', 'groups.group_name as group_name')
            ->get();
        return view('backendTeacher.grades.index')->with('grades', $grades);
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
        $lesson_id = DB::table('grades')->where('id', $id)->first();

        $students = DB::table('grades')
            ->where('grades.lesson_id', '=', $id) // Assuming 'lesson_id' is the column in the 'grades' table that references the lessons
            ->leftJoin('students', 'grades.student_id', '=', 'students.id')
            ->get();

        return view('backendTeacher.grades.edit')->with('grades', $id)->with('students', $students)
            ->with('lesson_id', $lesson_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $get_students_grades = DB::table('grades')
            ->where('grades.lesson_id', '=', $id)
            ->pluck('grades.student_id');

        // Dodawania danych do tabeli grades
        foreach ($get_students_grades as $student_id) {
            $grades = TeacherGrades::where('student_id', $student_id)
                ->where('lesson_id', $id)
                ->first();
            if ($grades) {

                $studentKey = $student_id;
                $gradeValue = $request->input("grade.{$studentKey}");

                if ($gradeValue !== null) {
                    $grades->grade = $gradeValue;

                    // Save the changes
                    $grades->save();
                }
            }
        }
        return redirect('gradesTeacher')->with('flash_msg', 'Zaktualizowano oceny!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

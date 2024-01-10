<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\TeacherAttendanceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TO działa
        $teacher_id = DB::table('teachers')->where('name', '=', auth()->user()->name)->first();
        $lessons = DB::table('teachers')
            ->leftJoin('subjects', 'teachers.id', '=', 'subjects.teacher_id')
            ->leftJoin('lessons', 'subjects.id', '=', 'lessons.subject_id')
            ->leftJoin('groups', 'groups.id', '=', 'lessons.group_id')
            ->where('teachers.id', '=', $teacher_id->id)
            ->select('lessons.*', 'subjects.name as subject_name', 'groups.group_name as group_name')
            ->get();
        return view('backendTeacher.lessons.index')->with('lessons', $lessons);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher_id = DB::table('teachers')->where('name', '=', auth()->user()->name)->first();
        $subjects = DB::table('subjects')
            ->leftJoin('teachers', 'teachers.id', '=', 'subjects.teacher_id')
            ->where('teachers.id', '=', $teacher_id->id)
            ->select('subjects.name as subject_name', 'subjects.id as subject_id')
            ->get()->pluck('subject_name', 'subject_id');
        $groups = Group::pluck('group_name', 'id');
        //$subjects = Subject::pluck('name', 'id');
        return view('backendTeacher.lessons.create', compact('groups', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lesson_date'     => 'date|after:yesterday',
        ]);
        $input = $request->all();

        // Utworzenie zajeć dla grupy
        $lesson = Lesson::create($input);

        // Utworznenie raportu obecności dla tych zajęć
        $group_id = $lesson->group_id;

        // Pobranie listy studentów w grupie
        $get_students_id = DB::table('groups')
            ->leftJoin('students_groups', 'groups.id', '=', 'students_groups.group_id')
            ->where('students_groups.group_id', '=', $group_id)
            ->pluck('students_groups.student_id');

        // Dodawania danych do tabeli attendance
        foreach ($get_students_id as $student_id) {
            TeacherAttendanceReport::create([
                'lesson_id' => $lesson->id,
                'student_id' => $student_id,
                'isPresent' => '0',
            ]);
        }
        return redirect('lessons')->with('flash_msg', 'Zajęcia utworzone!');
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

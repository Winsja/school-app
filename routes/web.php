<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentGradesController;
use App\Http\Controllers\StudentGroupsController;
use App\Http\Controllers\StudentLessonsController;
use App\Http\Controllers\StudentsGroupsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherAttendanceReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherGrades;
use App\Http\Controllers\TeacherGradesController;
use App\Http\Controllers\TeacherSubjectsController;
use App\Http\Controllers\UserController;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentsGroups;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route do których dostęp powinnien mieć tylko ADMIN
Route::middleware('auth', 'admin')->group(function () {
    Route::resource('/subjects', SubjectController::class);

    Route::resource('/teachers', TeacherController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/students', StudentController::class);

    Route::resource('/groups', GroupController::class);
    // 2 dodatkowe funkcje w route::group
    Route::post('/groups/addToGroup/{group}', [GroupController::class, 'addToGroup'])->name('groups.addToGroup');
    Route::delete('/groups/{g_id}/{s_id}', [GroupController::class, 'detachFromGroup'])->name('groups.detachFromGroup');
});

// Route do których dostęp powinnien mieć tylko NAUCZYCIEL
Route::middleware('auth', 'teacher')->group(function () {
    Route::resource('/subjectsTeacher', TeacherSubjectsController::class);
    Route::resource('/lessons', LessonsController::class);
    Route::resource('/attendanceTeacher', TeacherAttendanceReportController::class);
    Route::resource('/gradesTeacher', TeacherGradesController::class);
});

// Route do których dostęp powinnien mieć tylko Student
Route::middleware('auth', 'student')->group(function () {
    Route::resource('/lessonsStudent', StudentLessonsController::class);
    Route::resource('/groupsStudent', StudentGroupsController::class);
    Route::resource('/gradesStudent', StudentGradesController::class);
    Route::resource('/attendanceStudent', StudentAttendanceController::class);
});

require __DIR__ . '/auth.php';

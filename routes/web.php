<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentsGroupsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

Route::resource('/subjects', SubjectController::class);

Route::resource('/teachers', TeacherController::class);

Route::resource('/users', UserController::class);

Route::resource('/students', StudentController::class);
Route::resource('/groups', GroupController::class);
Route::post('/groups/addToGroup/{group}', [GroupController::class, 'addToGroup'])->name('groups.addToGroup');
Route::delete('/groups/{g_id}/{s_id}', [GroupController::class, 'detachFromGroup'])->name('groups.detachFromGroup');
Route::resource('/groupss', StudentsGroupsController::class);



require __DIR__ . '/auth.php';

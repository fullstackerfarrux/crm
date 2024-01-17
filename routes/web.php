<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\StudentsController;
use App\Models\Group;
use App\Models\Students;
use App\Models\Teachers;
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
    $countTeachers = count(Teachers::all());
    $countStudents = count(Students::all());
    $countGroups = count(Group::all());

    $currentYear = date('Y');
    $currentMonth = date('m');

    $studentsEnteredThisMonth = Students::whereYear('created_at', $currentYear)
        ->whereMonth('created_at', $currentMonth)
        ->count();

    return view('xisobot')->with(['count_teachers' => $countTeachers, 'count_students' => $countStudents, 'count_groups' => $countGroups, 'students_month' => $studentsEnteredThisMonth]);
})->middleware('CheckToken')->name('xisobot');

// <!---------- Auth --------!>
Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signin/store', [AuthController::class, 'signin_store'])->name('signin_store');

// <!---------- Groups --------!>
Route::get('/groups', [GroupsController::class, 'index'])->middleware('CheckToken')->name('groups_index');
Route::post('/groups/create', [GroupsController::class, 'create_store'])->name('group_create');
Route::get('/group/{id}', [GroupsController::class, 'show'])->middleware('CheckToken')->name('group_show');




// <!---------- Students --------!>
Route::get('/students', [StudentsController::class, 'index'])->middleware('CheckToken')->name('students_index');
Route::post('/students/create', [StudentsController::class, 'create_store'])->name('students_create');
Route::get('/students/edit', [StudentsController::class, 'check_time'])->name('students_edit');
Route::post('/students/{id}/destroy', [StudentsController::class, 'remove'])->name('students_destroy');

// <-- Its just test for create pull request --> 
<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// homepage
Route::get('/', [UserController::class, 'index']);

// login
Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');

// admin teacher
Route::get('/teachers', [TeachersController::class, 'index']);
Route::post('/teachers/add', [TeachersController::class, 'store'])->name('add.teacher');
Route::get('/teacher/tag/{id}', [TagsController::class, 'tag']);
Route::post('/teacher/tag/add', [TagsController::class, 'store'])->name('tag.store');

// admin students
Route::get('/students', [StudentsController::class, 'index']);
Route::post('/students/add', [StudentsController::class, 'store'])->name('add.student');

// login
// for teacher
Route::get('/teacher-login', [TeachersController::class, 'loginForm']);
Route::post('/teacher-login', [TeachersController::class, 'teacherLogin'])->name('teacher.login');

// for admin
Route::get('/admin-login', [UserController::class, 'loginForm']);
Route::post('/admin-login', [UserController::class, 'adminLogin'])->name('admin.login');

// teacher
Route::get('/download/file', [ExcelController::class, 'exportLists']);
Route::post('/upload/file', [ExcelController::class, 'importGrade'])->name('upload.grade');
Route::get('/grades', [GradesController::class, 'index']);
Route::get('/grade/{id}', [GradesController::class, 'show']);

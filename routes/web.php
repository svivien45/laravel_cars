<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\ClassesSubjectsController;
use App\Http\Controllers\SchoolClassesController;
use App\Http\Controllers\MarksController;
use App\Models\SchoolClass;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentsController::class);
Route::resource('school_classes', SchoolClassesController::class);
Route::resource('subjects', SubjectsController::class);
Route::resource('marks', MarksController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
    Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
    Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])->name('students.edit');
	Route::patch('/students/{student}', [StudentsController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/by-class/{id}', [StudentsController::class, 'getByClass']);

    Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create');
    Route::get('/subjects/{subject}/edit', [SubjectsController::class, 'edit'])->name('subjects.edit');
	Route::patch('/subjects/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');

    Route::post('/classes_subject', [ClassesSubjectsController::class, 'store'])->name('classes_subject.store');
    Route::get('/classes_subject/create', [ClassesSubjectsController::class, 'create'])->name('classes_subject.create');
    Route::get('/classes_subject/{classes_subject}/edit', [ClassesSubjectsController::class, 'edit'])->name('classes_subject.edit');
	Route::patch('/classes_subject/{classes_subject}', [ClassesSubjectsController::class, 'update'])->name('classes_subject.update');
    Route::delete('/classes_subject/{classes_subject}', [ClassesSubjectsController::class, 'destroy'])->name('classes_subject.destroy');

    Route::post('/school_classes', [SchoolClassesController::class, 'store'])->name('school_classes.store');
    Route::get('/school_classes/create', [SchoolClassesController::class, 'create'])->name('school_classes.create');
    Route::get('/school_classes/{school_class}/edit', [SchoolClassesController::class, 'edit'])->name('school_classes.edit');
	Route::patch('/school_classes/{school_class}', [SchoolClassesController::class, 'update'])->name('school_classes.update');
    Route::delete('/school_classes/{school_class}', [SchoolClassesController::class, 'destroy'])->name('school_classes.destroy');

    Route::post('/marks', [MarksController::class, 'store'])->name('marks.store');
    Route::get('/marks/create', [MarksController::class, 'create'])->name('marks.create');
    Route::get('/marks/{mark}/edit', [MarksController::class, 'edit'])->name('marks.edit');
	Route::patch('/marks/{mark}', [MarksController::class, 'update'])->name('marks.update');
    Route::delete('/marks/{mark}', [MarksController::class, 'destroy'])->name('marks.destroy');
});

require __DIR__.'/auth.php';

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index');
Route::get('/classes_subject', [ClassesSubjectsController::class, 'index'])->name('classes_subject.index');
Route::get('/school_classes', [SchoolClassesController::class, 'index'])->name('school_classes.index');
Route::get('/marks', [MarksController::class, 'index'])->name('marks.index');

Route::get('/students/student', [StudentsController::class, 'show'])->name('students.show');
Route::get('/subjects/subject', [SubjectsController::class, 'show'])->name('subjects.show');
Route::get('/classes_subject/classes_subject', [ClassesSubjectsController::class, 'show'])->name('classes_subject.show');
Route::get('/school_classes/school_class', [SchoolClassesController::class, 'show'])->name('school_classes.show');
Route::get('/marks/mark', [MarksController::class, 'show'])->name('marks.show');
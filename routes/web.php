<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Class_AverageController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\StudentCrudController;
use App\Http\Controllers\SubjectCrudController;
use App\Http\Controllers\ClassCrudController;
use App\Http\Controllers\Classes_SubjectCrudController;
use App\Http\Controllers\MarkCrudController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/classes/edit/{year}/{class}', [ClassController::class, 'edit'])->name('classes.edit');
    Route::get('/students/create/{year}/{class}', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/edit/{id}/{class_id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('/classes/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::post('/classes', [StudentController::class, 'store'])->name('students.store');
    Route::delete('/classes/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


});
Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('/classes/{year}/{class}', [ClassController::class, 'show'])->name('classes.show');

require __DIR__.'/auth.php';


Route::get('/crud.subjects', [SubjectCrudController::class, 'index'])->name('crud.subjects');
Route::get('/crud.classes_subjects', [Classes_SubjectCrudController::class, 'index'])->name('crud.classes_subjects');


Route::get('/crud.index', function () {
    return view('crud.index');
})->name('crud.index');

Route::get('/crud.classes', [ClassCrudController::class, 'index'])->name('crud.classes');
Route::get('/crud.students', [StudentCrudController::class, 'index'])->name('crud.students');
Route::get('/crud.marks', [MarkCrudController::class, 'index'])->name('crud.marks');

Route::resource('markscrud',MarkCrudController::class);
Route::resource('classes_subjectscrud',controller: Classes_SubjectCrudController::class);
Route::resource('classescrud',ClassCrudController::class);
Route::resource('classes',ClassController::class);
Route::resource('class_average',Class_AverageController::class);
Route::resource('crud', CrudController::class);
Route::resource('studentscrud', StudentCrudController::class);
Route::resource('subjectscrud', SubjectCrudController::class);
require __DIR__.'/auth.php';

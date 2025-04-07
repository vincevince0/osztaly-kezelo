<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Class_AverageController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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
});

Route::get('/crud.students', function () {
    return view('crud.students');
})->name('crud.students');

Route::get('/crud.subjects', [SubjectController::class, 'index'])->name('crud.subjects');


Route::get('/crud.index', function () {
    return view('crud.index');
})->name('crud.index');



Route::resource('classes',ClassController::class);
Route::resource('class_average',Class_AverageController::class);
Route::resource('crud', CrudController::class);
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
require __DIR__.'/auth.php';

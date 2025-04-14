<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StudentController;

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
Route::resource('marks',MarkController::class);

require __DIR__.'/auth.php';
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Osztaly;
use App\Models\Student;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('crud.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($year,$class)
    {
        $classData = Osztaly::where('year', $year)->where('name', $class)->get();
        return view('students.create', compact('classData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student  = new Student();
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->class_id = $request->input('class_id');
        $student->save();

        return redirect()->route('classes.index')->with('success', "{$student->name} sikeresen létrehozva");
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
    public function edit($id,$classid)
    {
        $classes = Osztaly::all();
        $year = $classes->firstWhere('id', $classid)->year ?? null;
        $student = Student::where('id', $id)->get();
        return view('students.edit', compact('student','classes','year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::where('id', $id);
        $student->class_id = $request->input('class_id');
        $student->save();

        return redirect()->route('classes.index')->with('alert', "{$student->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('classes.index')->with('success', 'Student deleted successfully.');
    }
}
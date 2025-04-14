<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student  = new Student();
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->class_id = $request->input('classid');
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
        $student  = Student::find($id);
        $student->delete();

        return redirect()->route('classes.index')->with('success', "{$student->name} sikeresen törölve");
    }
}

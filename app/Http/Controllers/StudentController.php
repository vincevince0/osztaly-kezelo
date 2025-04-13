<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
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
       
    // Find the student by ID
    $student = Student::findOrFail($id);

    // Validate the incoming data (e.g. just the name for now)
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Update the student's name
    $student->name = $request->input('name');
    $student->save();  // Save changes

    // Redirect back to a student list or profile page (or wherever you want)
    return redirect()->route('students.index')->with('success', 'Diák neve módosítva!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

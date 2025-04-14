<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\Student;

class MarkCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::with(['student', 'subject'])->get();
        return view('crud.marks', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();

        return view('crud.marks_create', compact('students','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'mark' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
        ]);

        $mark = new Mark();
        $mark->student_id = $request->student_id;
        $mark->subject_id = $request->subject_id;
        $mark->mark = $request->mark;
        $mark->date = $request->date;
        $mark->save();

        return redirect()->route('crud.marks')->with('success', 'Osztályzat sikeresen hozzáadva!');
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
    public function edit($id)
    {
        $mark = Mark::findOrFail($id);
        $students = Student::all();
        $subjects = Subject::all();

        return view('crud.marks_edit', compact('mark', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'mark' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
        ]);

        $mark = Mark::find($id);
        $mark->student_id = $request->student_id;
        $mark->subject_id = $request->subject_id;
        $mark->mark = $request->mark;
        $mark->date = $request->date;
        $mark->save();

        return redirect()->route('crud.marks')->with('success', 'Osztályzat sikeresen frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mark = Mark::find($id);
        $mark->delete();

        return redirect()->route('crud.marks')->with('success', "sikeres törlés");
    }
}

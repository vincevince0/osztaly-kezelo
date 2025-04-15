<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Osztaly;
use App\Models\Student;
use App\Models\Subject;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::all();
        $classes = Osztaly::where('year', 2025)->get();
        $classId = request('class_id');
        $students = $classId ? Student::where('class_id', $classId)->get() : collect();


        return view('marks.index', compact('marks','classes','students'));
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $student = Student::findOrFail($request->get('student_id'));
        $subjects = Subject::all();
    
        return view('marks.create', compact('student', 'subjects'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'student_id' => 'required|exists:students,id',
        'subject_id' => 'required|exists:subjects,id',
        'mark' => 'required|integer|min:1|max:5',
        'date' => 'required|date',
    ]);

    $mark = Mark::create($validated);

    return redirect()->route('students.marks', $validated['student_id'])
                     ->with('success', 'Jegy sikeresen hozzáadva.');
}



    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $marks = $student->marks()->with('subject')->get();

        return view('marks.show', compact('student', 'marks'));
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
    public function destroy($id)
    {
        $mark = Mark::findOrFail($id);
    
        $mark->delete();
    
        return redirect()->route('students.show', $mark->student_id . '/marks')
                         ->with('success', 'Jegy sikeresen törölve.');
    }
}
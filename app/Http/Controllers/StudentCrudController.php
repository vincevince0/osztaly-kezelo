<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Osztaly;

class StudentCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['class'])->get();
        return view('crud.students', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Osztaly::all();
        return view('crud.students_create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:F,N',
            'class_id' => 'required|exists:classes,id',
        ]);

        $vmi = new Student();
        $vmi->name = $request->name;
        $vmi->gender = $request->gender;
        $vmi->class_id = $request->class_id;
        $vmi->save();

        return redirect()->route('crud.students')->with('success', 'Tanuló sikeresen hozzáadva.');
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
        $student = Student::find($id);
        $classes = Osztaly::all();

        return view('crud.students_edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:F,N',
            'class_id' => 'required|exists:classes,id',
        ]);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->class_id = $request->input('class_id');
        $student->save();

        return redirect()->route('crud.students')->with('success', 'Tanuló sikeresen frissítve.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('crud.students')->with('success', "sikeres törlés");
    }
}

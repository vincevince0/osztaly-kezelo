<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes_Subject;
use App\Models\Osztaly;
use App\Models\Subject;

class Classes_SubjectCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes_subjects = Classes_Subject::with(['class', 'subject'])->get();
        return view('crud.classes_subjects', compact('classes_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Osztaly::all();
        $subjects = Subject::all();

        return view('crud.classes_subjects_create', compact('classes', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);
    
        $vmi = new Classes_Subject();
        $vmi->class_id = $request->class_id;
        $vmi->subject_id = $request->subject_id;
        $vmi->save();
    
        return redirect()->route('crud.classes_subjects')->with('success', 'Kapcsolat létrehozva!');
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
        $classes_subjects = Classes_Subject::find($id);
        $classes = Osztaly::all();
        $subjects = Subject::all();

        return view('crud.classes_subjects_edit', compact('classes_subjects', 'classes', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $class_subject = Classes_Subject::find($id);
        $class_subject->class_id = $request->class_id;
        $class_subject->subject_id = $request->subject_id;
        $class_subject->save();

        return redirect()->route('crud.classes_subjects')->with('success', 'Kapcsolat frissítve.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class_subject = Classes_Subject::find($id);
        $class_subject->delete();

        return redirect()->route('crud.classes_subjects')->with('success', "sikeres törlés");
    }
}

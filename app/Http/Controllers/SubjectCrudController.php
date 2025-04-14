<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('crud.subjects', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.subjects_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name',
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('crud.subjects')->with('success', "A(z) {$subject->name} tantárgy sikeresen létrehozva.");
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
        $subject = subject::find($id);
        return view('crud.subjects_edit', compact('subject'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subject = Subject::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:subjects,name,' . $subject->id,
        ]);

        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('crud.subjects')->with('success', "A(z) {$subject->name} sikeresen frissítve.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('crud.subjects')->with('success', "{$subject->name} sikeresen törölve");
    }
}

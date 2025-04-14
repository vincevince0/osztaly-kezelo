<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Osztaly;

class ClassCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classescrud = Osztaly::all();
        return view('crud.classes', compact('classescrud'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.classes_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|max:3000',
        ]);

        $class = new Osztaly();
        $class->name = $request->name;
        $class->year = $request->year;
        $class->save();

        return redirect()->route('crud.classes')->with('success', "A(z) {$class->name} tantárgy sikeresen létrehozva.");
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
        $class = Osztaly::find($id);
        return view('crud.classes_edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $class = Osztaly::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|max:3000',
        ]);
    
        $class->name = $request->name;
        $class->year = $request->year;
        $class->save();
    
        return redirect()->route('crud.classes')->with('success', 'Osztály frissítve!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Osztaly::find($id);
        $class->delete();

        return redirect()->route('crud.classes')->with('success', "{$class->name} sikeresen törölve");
    }
}

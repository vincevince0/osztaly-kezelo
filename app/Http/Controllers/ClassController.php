<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Osztaly;
use App\Models\Student;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Osztaly::all();
        return view('classes.index', compact('classes'));
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
    public function show($year,$class)
    {
        $classes = Osztaly::all();
        $classData = Osztaly::where('year', $year)->where('name', $class)->get();
        $students = Student::all();
        return view('classes.show', compact('classes','classData','students'));
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
        //
    }
}

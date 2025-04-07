<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school_classes = SchoolClass::all();
        return view('school_classes.index', compact('school_classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|string|max:255',],
            ['name.min' => 'A tanuló neve legalább 10 karakter hosszú legyen',]

        );

        $school_class = new SchoolClass();
        $school_class->name = $request->name;
        $school_class->year = $request->year;
        $school_class->save();

        return redirect()->route('school_classes.index')->with('success', 'Osztály sikeresen hozzáadva');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school_class = SchoolClass::find($id);
        return view('school_classes.show', compact('school_class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school_class = SchoolClass::find($id);
        return view('school_classes.edit', compact('school_class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $school_class = SchoolClass::find($id);
        $school_class->name = $request->name;
        $school_class->save();
        return redirect()->route('school_classes.index')->with('success', 'Osztály sikeresen módosítva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school_class = SchoolClass::find($id);
        $school_class->delete();

        return redirect()->route('school_classes.index')->with('success', 'Osztály sikeresen törölve');
    }
}

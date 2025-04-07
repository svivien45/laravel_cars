<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('subjects.create', compact('subjects'));
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

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Tantárgy sikeresen hozzáadva');
    }

    /**
     * Display the specified resource.
     */
  
    public function show(string $id)
    {
        $subject = Subject::find($id);
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::find($id);
        $school_classes = SchoolClass::all();
        return view('subjects.edit', compact('subject', 'school_classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255',],
            ['name.min' => 'A tanuló neve legalább 3 karakter hosszú legyen',]
        );

        $subject = subject::find($id);
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('subjects.index')->with('success', 'Tantárgy sikeresen módosítva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Tantárgy sikeresen törölve');
    }
}

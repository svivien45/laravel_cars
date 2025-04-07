<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Subject;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::all();
        $subjects = Subject::all();
        $students = Student::all();
        return view('marks.index', compact('marks', 'subjects', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        return view('marks.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mark = new Mark();
        $mark->subject_id = $request->subject_id;
        $mark->student_id = $request->student_id;
        $mark->mark = $request->mark;
        $mark->date = Carbon::now();
        $mark->save();

        return redirect()->route('marks.index')->with('success', 'Jegy sikeresen hozzáadva');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mark = Mark::find($id);
        return view('marks.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marks = Mark::find($id);
        $subjects = Subject::all();
        $students = Student::all();
        return view('marks.edit', compact('marks', 'subjects', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mark = Mark::find($id);
        $mark->subject_id = $request->subject_id;
        $mark->student_id = $request->student_id;
        $mark->mark = $request->mark;
        $mark->date = Carbon::now();
        $mark->save();
        return redirect()->route('marks.index')->with('success', 'Jegy sikeresen módosítva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mark = Mark::find($id);
        $mark->delete();

        return redirect()->route('marks.index')->with('success', 'Jegy sikeresen törölve');
    }
}

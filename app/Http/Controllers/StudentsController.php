<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $school_classes = SchoolClass::all();
        return view('students.index', compact('students', 'school_classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_classes = SchoolClass::all();
        return view('students.create', compact('school_classes'));
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

        $student = new Student();
        $student->name = $request->name;
        $student->class_id = $request->class_id;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Tanuló sikeresen hozzáadva');
    }

    /**
     * Display the specified resource.
     */
  
    public function show(string $id)
    {
        $students = Student::find($id);
        return view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $school_classes = SchoolClass::all();
        return view('students.edit', compact('student', 'school_classes'));
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

        $student = Student::find($id);
        $student->name = $request->name;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Tanuló sikeresen módosítva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Tanuló sikeresen törölve');
    }


    public function getByClass($id)
    {
        if ($id == 0) {
            return response()->json(Student::all());
        }

        return response()->json(
            Student::where('class_id', $id)->get()
        );
    }

}

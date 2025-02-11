<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Body;

class BodyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodies = Body::all();
        return view('bodies.index', compact('bodies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bodies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body  = new Body();
        $body->name = $request->input('name');
        $body->save();

        return redirect()->route('bodies.index')->with('success', "{$body->name} sikeresen létrehozva");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $body = Body::find($id);
        return view('bodies.show', compact('body'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $body = Body::find($id);
        return view('bodies.edit', compact('body'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $body  = Body::find($id);
        $body->name = $request->input('name');
        $body->save();

        return redirect()->route('bodies.index')->with('success', "{$body->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $body  = Body::find($id);
        $body->delete();

        return redirect()->route('bodies.index')->with('success', "Sikeresen törölve");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModelRequest;
use Illuminate\Http\Request;
use App\Models\Models;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Models::all();
        return view('models.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModelRequest $request)
    {
        $model  = new Models();
        $model->name = $request->input('name');
        $model->save();

        return redirect()->route('models.index')->with('success', "{$model->name} sikeresen létrehozva");
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
        $model = Models::find($id);
        return view('models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModelRequest $request, string $id)
    {
        $model  = Models::find($id);
        $model->name = $request->input('name');
        $model->save();

        return redirect()->route('models.index')->with('success', "{$model->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Models::find($id);
        if ($model) {
            $model->delete();
            return redirect()->route('models.index')->with('success', "Sikeresen törölve");
        }
    }
}

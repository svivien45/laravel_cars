<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use Illuminate\Http\Request;
use App\Models\Vehicles;
use Illuminate\Contracts\View\View;
use App\Models\Maker;
use App\Models\Models;
use App\Models\Body;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicles::all();
        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::all();
        $models = Models::all();
        $bodies = Body::all();

        return view('vehicles.create', compact('makers', 'models', 'bodies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        $vehicle  = new Vehicles();
        $vehicle->name = $request->input('name');
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', "{$vehicle->name} sikeresen létrehozva");
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
        $vehicle = Vehicles::find($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, string $id)
    {
        $vehicle  = Vehicles::find($id);
        $vehicle->name = $request->input('name');
        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', "{$vehicle->name} sikeresen módosítva");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicles::find($id);
        if ($vehicle) {
            $vehicle->delete();
            return redirect()->route('vehicles.index')->with('success', "Sikeresen törölve");
        }
    }
}

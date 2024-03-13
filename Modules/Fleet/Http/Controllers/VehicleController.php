<?php

namespace Modules\Fleet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Fleet\Entities\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('fleet::vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('fleet::vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'bodytype' => 'required',
            'fleetnumber' => 'required',
            'chasisnumber' => 'required',
            'enginenumber' => 'required',
            'yearofmanufacture' => 'required',
            'fueltype' => 'required',
            'netmass' => 'required',
            'regnumber' => 'required',
        ]);

        $vehicle = new Vehicle();

        $vehicle->make = $validatedData['make'];
        $vehicle->model = $validatedData['model'];
        $vehicle->colour = $validatedData['colour'];
        $vehicle->bodytype = $validatedData['bodytype'];
        $vehicle->fleetnumber = $validatedData['fleetnumber'];
        $vehicle->chasisnumber = $validatedData['chasisnumber'];
        $vehicle->enginenumber = $validatedData['enginenumber'];
        $vehicle->yearofmanufacture = $validatedData['yearofmanufacture'];
        $vehicle->fueltype = $validatedData['fueltype'];
        $vehicle->netmass = $validatedData['netmass'];
        $vehicle->regnumber = $validatedData['regnumber'];

        $vehicle->save();

        return redirect()->back()->with('success', 'Vehicle created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return redirect()->back()->with('error', 'Vehicle not found');
        }

        return view('fleet::vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return redirect()->back()->with('error', 'Vehicle not found');
        }

        return view('fleet::vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return redirect()->back()->with('error', 'Vehicle not found');
        }

        $validatedData = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'colour' => 'required',
            'bodytype' => 'required',
            'fleetnumber' => 'required',
            'chasisnumber' => 'required',
            'enginenumber' => 'required',
            'yearofmanufacture' => 'required',
            'fueltype' => 'required',
            'netmass' => 'required',
            'regnumber' => 'required',
        ]);

        $vehicle = new Vehicle();

        $vehicle->make = $validatedData['make'];
        $vehicle->model = $validatedData['model'];
        $vehicle->colour = $validatedData['colour'];
        $vehicle->bodytype = $validatedData['bodytype'];
        $vehicle->fleetnumber = $validatedData['fleetnumber'];
        $vehicle->chasisnumber = $validatedData['chasisnumber'];
        $vehicle->enginenumber = $validatedData['enginenumber'];
        $vehicle->yearofmanufacture = $validatedData['yearofmanufacture'];
        $vehicle->fueltype = $validatedData['fueltype'];
        $vehicle->netmass = $validatedData['netmass'];
        $vehicle->regnumber = $validatedData['regnumber'];

        $vehicle->save();

        return redirect()->back()->with('success', 'Vehicle created successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return redirect()->back()->with('error', 'Vehicle not found');
        }

        $vehicle->delete();

        return redirect()->back()->with('success', 'Vehicle deleted successfully');
    }
}

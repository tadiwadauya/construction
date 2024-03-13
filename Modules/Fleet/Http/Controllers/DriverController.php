<?php

namespace Modules\Fleet\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Fleet\Entities\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('fleet::drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('fleet::drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'paynumber' => 'required',
            'name' => 'required',
            'license_num' => 'required',
            'class_num' => 'required',
            'defensive' => 'required',
        ]);

        $driver = new Driver();

        $driver->paynumber = $validatedData['paynumber'];
        $driver->name = $validatedData['name'];
        $driver->license_num = $validatedData['license_num'];
        $driver->class_num = $validatedData['class_num'];
        $driver->defensive = $validatedData['defensive'];

        $driver->save();

        return redirect()->back()->with('success', 'Driver created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $driver = Driver::find($id);

        if (!$driver) {
            return redirect()->back()->with('error', 'Driver not found');
        }

        return view('fleet::drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $driver = Driver::find($id);

        if (!$driver) {
            return redirect()->back()->with('error', 'Driver not found');
        }

        return view('fleet::drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::find($id);

        if (!$driver) {
            return redirect()->back()->with('error', 'Driver not found');
        }

        $validatedData = $request->validate([
            'paynumber' => 'required',
            'name' => 'required',
            'license_num' => 'required',
            'class_num' => 'required',
            'defensive' => 'required',
        ]);

        $driver->paynumber = $validatedData['paynumber'];
        $driver->name = $validatedData['name'];
        $driver->license_num = $validatedData['license_num'];
        $driver->class_num = $validatedData['class_num'];
        $driver->defensive = $validatedData['defensive'];

        $driver->save();

        return redirect()->back()->with('success', 'Driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        if (!$driver) {
            return redirect()->back()->with('error', 'Driver not found');
        }

        $driver->delete();

        return redirect()->back()->with('success', 'Driver deleted successfully');
    }
}

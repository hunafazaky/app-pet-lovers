<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locations = Location::latest('created_at')->get();

        // Kirim data ke file view bernama index.blade.php di dalam folder views/locations
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $locations = Location::latest('created_at')->get();

        // Kirim data ke file view bernama index.blade.php di dalam folder views/locations
        return view('locations.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|unique:locations,name|max:255',
        ]);

        Location::create([
            'name' => $request->name,
        ]);

        return redirect()->route('locations.index')->with('success', 'New Location Registered');
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
        $location = Location::findOrFail($id);

        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|unique:locations,name|max:255',
        ]);

        Location::findOrFail($id)->update(['name' => $request->name]);
        return redirect()->route('locations.index')->with('success', 'Location Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::findOrFail($id)->delete();
        return redirect()->route('locations.index')->with('success', 'Location Data Deleted');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        Facility::create($request->all());

        return redirect()->route('admin.facilities.index')->with('success', 'Facility added successfully.');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $facility->update($request->all());

        return redirect()->route('admin.facilities.index')->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Facility deleted successfully.');
    }
}
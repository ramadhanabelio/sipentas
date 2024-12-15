<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::all();
        return view('admin.laboratories.index', compact('laboratories'));
    }

    public function create()
    {
        return view('admin.laboratories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('laboratories');
        }

        Laboratory::create($data);

        return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory created successfully.');
    }

    public function edit(Laboratory $laboratory)
    {
        return view('admin.laboratories.edit', compact('laboratory'));
    }

    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            if ($laboratory->image) {
                Storage::delete($laboratory->image);
            }
            $data['image'] = $request->file('image')->store('laboratories');
        }

        $laboratory->update($data);

        return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory updated successfully.');
    }

    public function destroy(Laboratory $laboratory)
    {
        if ($laboratory->image) {
            Storage::delete($laboratory->image);
        }

        $laboratory->delete();
        return redirect()->route('admin.laboratories.index')->with('success', 'Laboratory deleted successfully.');
    }
}

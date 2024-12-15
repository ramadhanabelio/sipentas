<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('admin.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip_nik' => 'required|unique:staff,nip_nik',
            'position' => 'required',
        ]);

        Staff::create([
            'name' => $request->name,
            'nip_nik' => $request->nip_nik,
            'position' => $request->position,
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff created successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required',
            'nip_nik' => 'required|unique:staff,nip_nik,' . $staff->id,
            'position' => 'required',
        ]);

        $staff->update([
            'name' => $request->name,
            'nip_nik' => $request->nip_nik,
            'position' => $request->position,
        ]);

        return redirect()->route('admin.staff.index')->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully.');
    }
}

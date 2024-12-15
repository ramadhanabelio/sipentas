<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lecturer;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('prodi')->get();
        return view('admin.lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('admin.lecturers.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:lecturers,email',
            'password' => 'required|min:6',
            'no_hp' => 'required',
            'nip_nik' => 'required|unique:lecturers,nip_nik',
            'nidn' => 'nullable',
            'id_prodi' => 'required|exists:prodis,id',
        ]);

        Lecturer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'nip_nik' => $request->nip_nik,
            'nidn' => $request->nidn,
            'id_prodi' => $request->id_prodi,
        ]);

        return redirect()->route('admin.lecturers.index')->with('success', 'Lecturer created successfully.');
    }

    public function edit(Lecturer $lecturer)
    {
        $prodis = Prodi::all();
        return view('admin.lecturers.edit', compact('lecturer', 'prodis'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:lecturers,email,' . $lecturer->id,
            'password' => 'nullable|min:6',
            'no_hp' => 'required',
            'nip_nik' => 'required|unique:lecturers,nip_nik,' . $lecturer->id,
            'nidn' => 'nullable',
            'id_prodi' => 'required|exists:prodis,id',
        ]);

        $lecturer->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $lecturer->password,
            'no_hp' => $request->no_hp,
            'nip_nik' => $request->nip_nik,
            'nidn' => $request->nidn,
            'id_prodi' => $request->id_prodi,
        ]);

        return redirect()->route('admin.lecturers.index')->with('success', 'Lecturer updated successfully.');
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('admin.lecturers.index')->with('success', 'Lecturer deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::all();
        return view('admin.prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('admin.prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:prodis,name',
            'level' => 'required',
        ]);

        Prodi::create([
            'name' => $request->name,
            'level' => $request->level,
        ]);

        return redirect()->route('admin.prodi.index')->with('success', 'Program Studi created successfully.');
    }

    public function edit(Prodi $prodi)
    {
        return view('admin.prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $prodi)
    {
        $request->validate([
            'name' => 'required|unique:prodis,name,' . $prodi->id,
            'level' => 'required',
        ]);

        $prodi->update([
            'name' => $request->name,
            'level' => $request->level,
        ]);

        return redirect()->route('admin.prodi.index')->with('success', 'Program Studi updated successfully.');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('admin.prodi.index')->with('success', 'Program Studi deleted successfully.');
    }
}

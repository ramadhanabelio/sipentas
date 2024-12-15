<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Laboratory;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function store(Request $request, $laboratoryId)
    {
        $laboratory = Laboratory::findOrFail($laboratoryId);

        $peminjaman = new Peminjaman();
        $peminjaman->user_id = auth()->user()->id;
        $peminjaman->laboratory_id = $laboratory->id;
        $peminjaman->save();

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Fasilitas berhasil dipinjam.');
    }
}

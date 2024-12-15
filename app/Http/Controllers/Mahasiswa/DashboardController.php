<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Laboratory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::all();

        return view('mahasiswa.dashboard', compact('laboratories'));
    }
}

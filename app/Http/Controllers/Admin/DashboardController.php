<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Staff;
use App\Models\Prodi;
use App\Models\Lecturer;
use App\Models\Facility;
use App\Models\Laboratory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLaboratory = Laboratory::count();
        $totalFacilities = Facility::count();
        $totalUsers = User::count();
        $totalLecturer = Lecturer::count();
        $totalStaff = Staff::count();
        $totalProdi = Prodi::count();

        return view('admin.dashboard', compact('totalLaboratory', 'totalFacilities', 'totalUsers', 'totalLecturer', 'totalStaff', 'totalProdi'));
    }
}

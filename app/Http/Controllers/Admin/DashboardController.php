<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFacilities = Facility::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalFacilities', 'totalUsers'));
    }
}

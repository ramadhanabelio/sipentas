<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    public function index()
    {
        $students = User::all();
        $lecturers = Lecturer::all();

        return view('admin.users.index', compact('students', 'lecturers'));
    }
}

<?php

namespace App\Controllers\Core;

use App\Models\User;
use App\Models\AreaParkir;
use App\Models\Role; // <-- Import model Role
use Sakuci\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('core.dashboard', ['user' => User::current()]);
    }

    public function admin()
    {
        return view('core.admin.dashboard', [
            'user' => User::current(),
            'totalAreaParkir' => AreaParkir::count(),
            'totalUser' => User::count(),
            'totalRole' => Role::count() // <-- Ambil total seluruh role
        ]);
    }
}
<?php

namespace App\Controllers; // <-- Gunakan App\Controllers (tanpa Http)

// Import model-model Anda sesuai lokasi model di Sakuci Framework
use App\Models\User;
use App\Models\Role;
use App\Models\AreaParkir; // Sesuaikan dengan nama model Anda
use App\Models\Member;     // Sesuaikan dengan nama model Anda

class WelcomeController
{
    public function index()
    {
        $totalUser = class_exists(User::class) ? User::count() : 0;
        $totalRole = class_exists(Role::class) ? Role::count() : 0;
        $totalAreaParkir = class_exists(AreaParkir::class) ? AreaParkir::count() : 0;
        $totalMember = class_exists(Member::class) ? Member::count() : 0;

        return view('welcome', compact('totalUser', 'totalRole', 'totalAreaParkir', 'totalMember'));
    }
}

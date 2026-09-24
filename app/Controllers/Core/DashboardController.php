<?php

namespace App\Controllers\Core;

use App\Models\User;
use App\Models\AreaParkir;
use App\Models\Role;
use App\Models\Member;
use App\Models\Transaksi;
use Sakuci\Controller;

class DashboardController extends Controller
{
    /**
     * Route universal /dashboard
     * Dialihkan otomatis ke prefix role masing-masing.
     */
    public function index()
    {
        $user = User::current();

        if (!$user) {
            return redirect('/login');
        }

        return match (strtolower($user->role)) {
            'admin'   => redirect('/admin'),
            'petugas' => redirect('/petugas'),
            'owner'   => redirect('/owner'),
            default   => redirect('/user'),
        };
    }

    /**
     * Dashboard khusus Admin
     */
    public function admin()
    {
        return view('core.admin.dashboard', [
            'user'            => User::current(),
            'totalAreaParkir' => AreaParkir::count(),
            'totalUser'       => User::count(),
            'totalRole'       => Role::count(),
            'totalMember'     => Member::count()
        ]);
    }

    /**
     * Dashboard khusus Petugas
     */
    public function petugas()
    {
        $today = date('Y-m-d');

        // Menggunakan LIKE untuk memfilter format tanggal 'YYYY-MM-DD%'
        $parkirMasukHariIni  = Transaksi::where('waktu_masuk', 'LIKE', $today . '%')->count();
        $parkirKeluarHariIni = Transaksi::where('waktu_keluar', 'LIKE', $today . '%')->count();
        $sedangParkir        = Transaksi::whereNull('waktu_keluar')->count();
        
        // Data area parkir untuk kapasitas
        $areaParkir          = AreaParkir::all();
        
        // Data kendaraan aktif yang sedang terparkir (diurutkan berdasarkan waktu_masuk terbaru)
        $kendaraanTerparkir  = Transaksi::whereNull('waktu_keluar')->latest('waktu_masuk')->get();

        return view('petugas.dashboard', [
            'user'                => User::current(),
            'parkirMasukHariIni'  => $parkirMasukHariIni,
            'parkirKeluarHariIni' => $parkirKeluarHariIni,
            'sedangParkir'        => $sedangParkir,
            'areaParkir'          => $areaParkir,
            'kendaraanTerparkir'  => $kendaraanTerparkir
        ]);
    }
}
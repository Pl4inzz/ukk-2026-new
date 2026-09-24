<?php

namespace App\Http\Controllers;

use App\Models\ParkirTransaksi;
use App\Models\AreaParkir;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function dashboard()
    {
        $today = date('Y-m-d');

        // Statistik Operasional
        $parkirMasukHariIni  = ParkirTransaksi::whereDate('waktu_masuk', $today)->count();
        $parkirKeluarHariIni = ParkirTransaksi::whereDate('waktu_keluar', $today)->count();
        $sedangParkir        = ParkirTransaksi::whereNull('waktu_keluar')->count();

        // Data Area Parkir untuk pantau sisa kapasitas
        $areaParkir = AreaParkir::all();

        return view('petugas.dashboard', compact(
            'parkirMasukHariIni',
            'parkirKeluarHariIni',
            'sedangParkir',
            'areaParkir'
        ));
    }
}
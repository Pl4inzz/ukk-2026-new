<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;

class TransaksiController extends Controller
{
    
    public function index(Request $request)
    {
        // Ambil semua data transaksi dari database
        $transaksis = \App\Models\Transaksi::all();

        // Tampilkan view index dengan data transaksi
        return view('transaksi.index', ['transaksis' => $transaksis]);
    }
}

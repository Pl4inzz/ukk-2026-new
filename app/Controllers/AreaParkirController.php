<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\AreaParkir;

class AreaParkirController extends Controller
{
    public function index(Request $request)
    {
        $data= AreaParkir::orderBy('id_area', 'desc')
            ->paginate(5);
        return view('area-parkir.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('area-parkir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_area'=> 'required',
            'kapasitas'=> 'required|numeric',
            'terisi'=> 'required|numeric',
        ]);

        AreaParkir::create([
            'nama_area'=> $request->input('nama_area'),
            'kapasitas'=> $request->input('kapasitas'),
            'terisi'=> $request->input('terisi'),
        ]);

        return redirect()->route('area-parkir.index')->with('success', 'daftar area parkir berhasil ditambahkan');
    }
}

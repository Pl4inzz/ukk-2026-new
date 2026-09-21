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

    public function edit(Request $request, $id_area)
    {
        $data = AreaParkir::findOrFail($id_area);
        return view('area-parkir.edit', compact('data'));
    }

    public function update(Request $request, $id_area)
    {
        $request->validate([
            'nama_area'=> 'required',
            'kapasitas'=> 'required|numeric',
            'terisi'=> 'required|numeric',
        ]);

        $data = AreaParkir::findOrFail($id_area);
        $data->update([
            'nama_area'=> $request->input('nama_area'),
            'kapasitas'=> $request->input('kapasitas'),
            'terisi'=> $request->input('terisi'),
        ]);

        return redirect()->route('area-parkir.index')->with('success', 'daftar area parkir berhasil diperbarui');
    }

    public function destroy(Request $request, $id_area)
    {
        $data = AreaParkir::findOrFail($id_area);
        $data->delete();

        return redirect()->route('area-parkir.index')->with('success', 'daftar area parkir berhasil dihapus');
    }
}

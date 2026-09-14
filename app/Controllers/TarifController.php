<?php

namespace App\Controllers;


use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Tarif;

class TarifController extends Controller
{
    public function index(Request $request)
    {
        $data= Tarif::orderBy('id_tarif', 'desc')
            ->paginate(5);
        return view('tarif.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('tarif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan'=> 'required',
            'tarif_per_jam'=> 'required|numeric',
        ]);

        $cek = Tarif::where(
            'jenis_kendaraan',
            $request->input('jenis_kendaraan')
        )->first();

        if ($cek) {
            return redirect()->route('tarif.create')
            ->with('error', 'jenis kendaraan sudah terdaftar');
        }

        tarif::create([
            'jenis_kendaraan'=> $request->input('jenis_kendaraan'),
            'tarif_per_jam'=> $request->input('tarif_per_jam'),
        ]);

        return redirect()->route('tarif.index')->with('success', 'daftar tarif berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $tarif = tarif::find($id);

        if ($tarif) {
            $tarif->delete();
        }
        return redirect()->route('tarif.index')
        ->with('success', 'daftar tarif berhasil dihapus');
    }

    public function edit($id_tarif)
    {
        $tarif = tarif::findorfail($id_tarif);
         return view('tarif.edit', compact('tarif'));
    }

    public function update(Request $request, $id_tarif)
    {
        $request->validate([
            'jenis_kendaraan'=> 'required',
            'tarif_per_jam'=> 'required|numeric',
        ]);

        $tarif = tarif::findorfail($id_tarif);
        $tarif->update([
            'jenis_kendaraan'=> $request->input('jenis_kendaraan'),
            'tarif_per_jam'=> $request->input('tarif_per_jam'),
        ]);

        return redirect()->route('tarif.index')->with('success', 'daftar tarif berhasil diubah');
    }


}

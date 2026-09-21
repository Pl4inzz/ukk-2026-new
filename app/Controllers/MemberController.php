<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Member;
use App\Models\User; // <-- Pastikan Model User di-import di atas

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $data = Member::orderBy('id_member', 'desc')->paginate(5);
        
        // Ambil data semua user untuk dropdown pemilik di form
        $users = User::all(); 

        // Kirim $data dan $users secara bersamaan ke view
        return view('member.index', compact('data', 'users'));
    }

    public function create(Request $request)
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'warna' => 'required',
            'id_user' => 'required', // Pastikan id_user divalidasi
        ]);

        Member::create([
            'id_user' => $request->id_user,
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => null, // Kolom pemilik dikosongkan karena terintegrasi ke id_user
        ]);

        return redirect()->route('member.index')
            ->with('success', 'Member created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $member = Member::find($id);
        $users = User::all(); // Kirim juga $users ke view edit jika form edit menggunakan dropdown user

        return view('member.edit', compact('member', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required',
            'warna' => 'required',
            'id_user' => 'required',
        ]);

        $member = Member::find($id);
        $member->update([
            'id_user' => $request->id_user,
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => null,
        ]);

        return redirect()->route('member.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('member.index')
            ->with('success', 'Member deleted successfully.');
    }
}
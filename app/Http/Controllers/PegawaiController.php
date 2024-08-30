<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = PegawaiModel::all();
        // dd($pegawai);
        return view('pegawai.index', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
        ]);

        $pegawai = new PegawaiModel();
        $pegawai->nama_pegawai = $validatedData['nama_pegawai'];
        $pegawai->posisi = $validatedData['posisi'];
        $pegawai->save();

        return response()->json(['success' => true]);
    }
}

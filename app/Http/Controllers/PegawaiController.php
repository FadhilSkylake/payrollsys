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
}

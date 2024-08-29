<?php

namespace App\Http\Controllers;

use App\Models\AbsensiModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('pegawai.absen');
    }

    // public function absenMasuk($pegawaiId)
    // {
    //     $tanggalHariIni = Carbon::now()->toDateString();
    //     $jamMasuk = Carbon::now()->toTimeString();

    //     // Cek apakah sudah ada data absen untuk hari ini
    //     $absensiHariIni = AbsensiModel::where('pegawai_id', $pegawaiId)
    //         ->whereDate('tanggal', $tanggalHariIni)
    //         ->first();

    //     if ($absensiHariIni) {
    //         return response()->json(['message' => 'Anda sudah absen masuk hari ini.'], 400);
    //     }

    //     // Jika belum ada, simpan data absen masuk
    //     AbsensiModel::create([
    //         'pegawai_id' => $pegawaiId,
    //         'tanggal' => $tanggalHariIni,
    //         'jam_masuk' => $jamMasuk,
    //     ]);

    //     return response()->json(['message' => 'Absen masuk berhasil.'], 200);
    // }

    public function absenMasuk()
    {
        $pegawaiId = 1; // ID pegawai dummy
        $tanggalHariIni = Carbon::now()->toDateString();
        $jamMasuk = Carbon::now()->toTimeString();

        // Jam masuk yang seharusnya
        $jamMasukSeharusnya = Carbon::createFromFormat('H:i:s', '08:00:00')->toTimeString();

        // Cek apakah sudah ada data absen untuk hari ini
        $absensiHariIni = AbsensiModel::where('pegawai_id', $pegawaiId)
            ->whereDate('tanggal', $tanggalHariIni)
            ->first();

        if ($absensiHariIni) {
            return response()->json(['message' => 'Anda sudah absen masuk hari ini.'], 400);
        }

        // Tentukan apakah terlambat
        $keterlambatan = Carbon::parse($jamMasuk)->gt(Carbon::parse($jamMasukSeharusnya)->addMinutes(15));

        // Simpan data absen masuk
        AbsensiModel::create([
            'pegawai_id' => $pegawaiId,
            'tanggal' => $tanggalHariIni,
            'jam_masuk' => $jamMasuk,
            'keterlambatan' => $keterlambatan,
        ]);

        return response()->json(['message' => 'Absen masuk berhasil.', 'keterlambatan' => $keterlambatan], 200);
    }


    public function absenPulang()
    {
        $pegawaiId = 1; // ID pegawai dummy
        $tanggalHariIni = Carbon::now()->toDateString();
        $jamPulang = Carbon::now()->toTimeString();

        // Cek apakah sudah ada data absen masuk untuk hari ini
        $absensiHariIni = AbsensiModel::where('pegawai_id', $pegawaiId)
            ->whereDate('tanggal', $tanggalHariIni)
            ->first();

        if (!$absensiHariIni) {
            return response()->json(['message' => 'Anda belum absen masuk hari ini.'], 400);
        }

        // Jika sudah ada, perbarui data dengan jam pulang dan set kolom kehadiran
        $absensiHariIni->update([
            'jam_pulang' => $jamPulang,
            'kehadiran' => true,
        ]);

        return response()->json(['message' => 'Absen pulang berhasil dan kehadiran tercatat.'], 200);
    }
}

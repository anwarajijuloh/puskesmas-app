<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Models\RiwayatKesehatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DokterDashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Dokter';
        $dokterId = Auth::guard('dokter')->user()->dokter->id;

        // Jumlah pasien yang ditangani oleh dokter
        $pasienCount = RiwayatKesehatan::where('dokter_id', $dokterId)->distinct('pasien_id')->count('pasien_id');

        // Jumlah antrian dokter
        $antrianCount = Antrian::where('dokter_id', $dokterId)->count();

        // Jumlah hari kerja dokter (diasumsikan bahwa setiap tanggal unik mewakili satu hari kerja)
        // $hariKerjaCount = Antrian::where('dokter_id', $dokterId)
        //     ->select(DB::raw('DATE(created_at) as work_date'))
        //     ->distinct('work_date')
        //     ->count('work_day');

        // Antrian terbaru dokter
        $antrianTerbaru = Antrian::where('dokter_id', $dokterId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Rekam medis terbaru dokter
        $rekamMedisTerbaru = RiwayatKesehatan::where('dokter_id', $dokterId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dokters.index', compact('title', 'pasienCount', 'antrianCount', 'antrianTerbaru', 'rekamMedisTerbaru'));
    }
}

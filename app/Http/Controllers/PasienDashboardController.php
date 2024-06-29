<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Antrian;
use Illuminate\Http\Request;
use App\Models\RiwayatKesehatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PasienDashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Pasien';

        $pasienId = auth()->user()->pasien->id;

        $antrianCount = Antrian::where('pasien_id', $pasienId)->count();

        $rikesCount = RiwayatKesehatan::where('pasien_id', $pasienId)->count();

        $latestRikes = RiwayatKesehatan::where('pasien_id', $pasienId)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $mostVisitedPoli = Antrian::select('poli_id', DB::raw('count(*) as total'))
            ->where('pasien_id', $pasienId)
            ->groupBy('poli_id')
            ->orderBy('total', 'desc')
            ->with('poli')
            ->take(5)
            ->get();

        return view('pasiens.index', compact('title', 'antrianCount', 'rikesCount', 'latestRikes', 'mostVisitedPoli'));
    }
}

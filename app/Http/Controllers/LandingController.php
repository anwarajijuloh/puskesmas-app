<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Poli;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Antrian;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $pasienCount = Pasien::count();
        $antrianDoneCount = Antrian::where('status', 'selesai')->count();
        $antrianCount = Antrian::count();
        return view('landing.index', compact('title', 'pasienCount', 'antrianCount', 'antrianDoneCount'));
    }
    public function queue(Request $request)
    {
        $title = 'Antrian';
        $query = Antrian::whereDate('created_at', Carbon::today());

        // Filter by Clinic
        if ($request->has('poli_id') && $request->poli_id) {
            $query->where('poli_id', $request->poli_id);
        }

        // Paginate the results
        $antrians = $query->paginate(10);

        // Get all clinics for the filter dropdown
        $polis = Poli::all();
        return view('landing.queue', compact('title', 'antrians', 'polis'));
    }
    public function poli()
    {
        $title = 'Poli';
        $polis = Poli::all();
        return view('landing.poli', compact('title', 'polis'));
    }
    public function doctor()
    {
        $title = 'Dokter';
        $dokters = Dokter::all();
        return view('landing.doctor', compact('title', 'dokters'));
    }
    public function about()
    {
        $title = 'About';
        return view('landing.about', compact('title'));
    }
}

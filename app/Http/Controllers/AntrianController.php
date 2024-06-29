<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public function indexPasien(Request $request)
    {
        $title = 'Antrian';
        $user = Auth::user();

        $query = Antrian::query();

        // Filter by Clinic
        if ($request->has('poli_id')) {
            $query->where('poli_id', $request->poli_id);
        }

        // Filter by Priority
        if ($request->has('prioritas')) {
            $query->where('prioritas', $request->prioritas);
        }

        // Filter by Patient (current logged in user)
        $pasiendId = auth()->user()->pasien->id;
        $query->where('pasien_id', $pasiendId);

        // Sorting
        $sortDirection = $request->get('sort', 'asc');
        $query->orderBy('created_at', $sortDirection);

        $antrians = $query->get();
        $polis = Poli::all();

        return view('antrian.index', compact('antrians', 'polis', 'title'));
    }
    public function indexDokter(Request $request)
    {
        $title = 'Antrian';
        $user = Auth::guard('dokter')->user();

        $query = Antrian::query();

        // Filter by Clinic
        if ($request->has('poli_id')) {
            $query->where('poli_id', $request->poli_id);
        }

        // Filter by Priority
        if ($request->has('prioritas')) {
            $query->where('prioritas', $request->prioritas);
        }

        // Filter by Patient (current logged in user)
        $dokterId = $user->dokter->id;
        $query->where('dokter_id', $dokterId);

        // Sorting
        $sortDirection = $request->get('sort', 'asc');
        $query->orderBy('created_at', $sortDirection);

        $antrians = $query->get();
        $polis = Poli::all();

        return view('antrian.index', compact('antrians', 'polis', 'title'));
    }
}

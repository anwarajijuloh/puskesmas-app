<?php

namespace App\Http\Controllers;

use App\Models\RiwayatKesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKesehatanController extends Controller
{
    public function indexPasien()
    {
        $title = 'Riwayat Kesehatan';
        $user = Auth::user();
        $riwayatkesehatans = RiwayatKesehatan::whereHas('pasien', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['pasien.user', 'dokter'])->get();
        return view('riwayatkesehatan.index', compact('riwayatkesehatans', 'title'));
    }
    public function indexDokter()
    {
        $title = 'Riwayat Kesehatan';
        $user = Auth::guard('dokter')->user();
        $riwayatkesehatans = RiwayatKesehatan::whereHas('pasien', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with(['pasien.user', 'dokter'])->get();
        return view('riwayatkesehatan.index', compact('riwayatkesehatans', 'title'));
    }
}

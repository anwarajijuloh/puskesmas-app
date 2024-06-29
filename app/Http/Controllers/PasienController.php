<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\RiwayatKesehatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function profile()
    {
        $title = 'Pasien Profile';
        $user = Auth::user();
        $pasien = $user->pasien;
        $totalAntrian = Antrian::where('pasien_id', $pasien->id)->count();

        // Hitung total riwayat kesehatan
        $totalRiwayat = RiwayatKesehatan::where('pasien_id', $pasien->id)->count();
        return view('pasiens.profile', compact('pasien', 'title', 'user', 'totalAntrian', 'totalRiwayat'));
    }
    public function setting()
    {
        $title = 'Pasien Setting';
        $user = Auth::user();
        $pasien = $user->pasien;
        return view('pasiens.setting', compact('pasien', 'title', 'user'));
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $pasien = $user->pasien;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'tgl_lahir' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = 'pasien' . time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $pasien->photo = 'images/' . $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        return redirect()->route('pasien.setting')->with('success', 'Profile berhasil diupdate.');
    }
}

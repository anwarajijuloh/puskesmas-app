<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Antrian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\RiwayatKesehatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function profile()
    {
        $title = 'Dokter Profile';
        $user = Auth::guard('dokter')->user();
        $dokter = $user->dokter;
        $totalAntrian = Antrian::where('dokter_id', $dokter->id)->count();

        // Hitung total riwayat kesehatan
        $totalRiwayat = RiwayatKesehatan::where('dokter_id', $dokter->id)->count();
        return view('dokters.profile', compact('dokter', 'title', 'user', 'totalAntrian', 'totalRiwayat'));
    }
    public function setting()
    {
        $title = 'Dokter Setting';
        $user = Auth::guard('dokter')->user();
        $dokter = $user->dokter;
        return view('dokters.setting', compact('dokter', 'title', 'user'));
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::guard('dokter')->user()->id);
        $dokter = $user->dokter;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($request->hasFile('photo')) {
            $imageName = 'dokter' . time().'.'.$request->photo->extension();
            $request->photo->move(public_path('images/dokter'), $imageName);
            $dokter->photo = 'images/dokter/' . $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $dokter->save();

        return redirect()->route('dokter.setting')->with('success', 'Profile berhasil diupdate.');
    }
}

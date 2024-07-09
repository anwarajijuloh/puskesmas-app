<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
    public function setting()
    {
        $user = Auth::user();
        $patient = $user->patient;
        $doctor = $user->doctor;

        return view('user.setting', compact('user', 'patient', 'doctor'));
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'gender' => 'required|string|in:Laki-laku,Perempuan',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
        ]);
        /** @var \App\Models\User */
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $patient = $user->patient;
        $patient->update([
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        if ($user->role == 'patient') {
            $patient = $user->patient;
            if ($request->hasFile('photo')) {
                $imageName = 'patient' . time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('assets/images/patient'), $imageName);
                $patient->photo = 'assets/images/patient/' . $imageName;
            }
            $patient->save();
            return redirect()->back()->with('success', 'Photo updated successfully.');
        } elseif ($user->role == 'doctor') {
            $doctor = $user->doctor;
            if ($request->hasFile('photo')) {
                $imageName = 'doctor' . time() . '.' . $request->photo->extension();
                $request->photo->move(public_path('assets/images/doctor'), $imageName);
                $doctor->photo = 'assets/images/doctor/' . $imageName;
            }
            $doctor->save();
            return redirect()->back()->with('success', 'Photo updated successfully.');
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:6',
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
            'confirm_password' => 'required|string|min:6',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('setting')->with('error', 'Password lama salah.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Auth::logout();

        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silahkan login kembali.');
    }
}

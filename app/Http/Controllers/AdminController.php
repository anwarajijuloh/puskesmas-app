<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\DoctorUpdateRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }
    public function showDoctorRequests()
    {
        $user = Auth::user();
        $requests = DoctorUpdateRequest::with('polyclinic')->get();
        return view('admin.doctor_request', compact('requests', 'user'));
    }
    public function approveDoctorRequest($id)
    {
        $request = DoctorUpdateRequest::findOrFail($id);
        $user = User::findOrFail($request->doctor_id);
        $doctor = Doctor::where('user_id', $user->id)->first();

        // Update user and doctor profiles
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $doctor->polyclinic_id = $request->polyclinic_id;
        $doctor->save();

        // Update request status
        $request->status = 'approved';
        $request->save();

        return redirect()->route('admin.doctor-request')->with('success', 'Pengajuan update profil telah disetujui.');
    }

    public function rejectDoctorRequest($id)
    {
        $request = DoctorUpdateRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->route('admin.doctor-request')->with('success', 'Pengajuan update profil telah ditolak.');
    }
    public function appointment()
    {
        $user = Auth::user();
        return view('admin.appointment', compact('user'));
    }
}

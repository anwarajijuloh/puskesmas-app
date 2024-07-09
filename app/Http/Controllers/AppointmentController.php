<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'patient') {
            $appointments = Appointment::with('doctor', 'patient')->where('patient_id', auth()->user()->patient->id)->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(12);
            $doctors = Doctor::all();
            return view('appointment.index', compact('appointments', 'doctors'));
        } elseif (auth()->user()->role == 'doctor') {
            $user = auth()->user();
            $appointments = Appointment::with('doctor', 'patient')->where('doctor_id', $user->doctor->id)->orderBy('created_at', 'desc')->paginate(12);
            $patients = Patient::all();
            return view('appointment.index', compact('appointments', 'patients', 'user'));
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_time' => 'required|date|after:now',
        ]);

        $appointment = new Appointment();
        $appointment->patient_id = Auth::user()->patient->id;
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->appointment_time = Carbon::parse($request->input('appointment_time'));
        $appointment->status = 'dibuat';
        $appointment->save();

        return redirect()->back()->with('success', 'Janji temu berhasil dibuat.');
    }
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->back()->with('success', 'Janji temu berhasil dihapus.');
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
           'status' =>'required|in:diterima,ditolak,selesai',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->input('status');
        $appointment->save();

        return redirect()->back()->with('success', 'Status janji temu berhasil diubah.');
    }
}

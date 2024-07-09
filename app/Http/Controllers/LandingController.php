<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Queue;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Polyclinic;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $polyclinics = Polyclinic::all();
        $patientCount = User::where('role', 'patient')->count();
        $doctors = Doctor::all();
        $appointmentDoneCount = Appointment::where('status', 'selesai')->count();
        $appointmentCreatedCount = Appointment::count();
        $queueCount = Queue::count();
        $queues = Queue::orderBy('created_at', 'desc')->paginate(5);
        return view('index', compact('user', 'polyclinics', 'patientCount', 'doctors', 'appointmentDoneCount', 'queues', 'appointmentCreatedCount', 'queueCount'));
    }
}

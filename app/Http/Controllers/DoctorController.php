<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\Appointment;
use App\Models\HealthRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $doctorId = $user->doctor->id;

        // Jumlah kehadiran
        $totalAttendance = Attendance::where('doctor_id', $doctorId)->count();

        // Kehadiran bulan ini
        $attendanceThisMonth = Attendance::where('doctor_id', $doctorId)
            ->whereMonth('date', Carbon::now('asia/jakarta')->month)
            ->count();

        // Kehadiran bulan kemarin
        $attendanceLastMonth = Attendance::where('doctor_id', $doctorId)
            ->whereMonth('date', Carbon::now('asia/jakarta')->subMonth()->month)
            ->count();

        // Kehadiran hari ini
        $attendanceToday = Attendance::where('doctor_id', $doctorId)
            ->whereDate('date', Carbon::today('asia/jakarta'))
            ->get();

        // Janji temu terbaru
        $latestAppointments = Appointment::where('doctor_id', $doctorId)
            ->where('status', '=', 'dibuat')
            ->orderBy('appointment_time', 'desc')
            ->take(5)
            ->get();

        // Diagnosis terbaru
        $latestDiagnoses = HealthRecord::where('doctor_id', $doctorId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view(
            'doctor.index',
            compact(
                'user',
                'totalAttendance',
                'attendanceThisMonth',
                'attendanceLastMonth',
                'latestAppointments',
                'latestDiagnoses',
                'attendanceToday'
            )
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Polyclinic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $patient = $user->patient;

        // dokter yang sering dipilih
        $mostPopularDoctors = DB::table('appointments')
            ->select('users.name', 'doctors.photo', DB::raw('count(appointments.id) as total_appointments'))
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->groupBy('users.name', 'doctors.photo')
            ->orderBy('total_appointments', 'desc')
            ->where('patient_id', $patient->id)
            ->limit(5)
            ->get();

        // Appointment Terbaru
        $latestAppointments = DB::table('appointments')
            ->select('appointments.*', 'patient_users.name as patient_name', 'doctor_users.name as doctor_name')
            ->join('users as patient_users', 'appointments.patient_id', '=', 'patient_users.id')
            ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
            ->join('users as doctor_users', 'doctors.user_id', '=', 'doctor_users.id')
            ->orderBy('appointments.created_at', 'desc')
            ->where('patient_id', $patient->id)
            ->limit(10)
            ->get();

        // HealthRecord Terbaru
        $latestHealthRecords = DB::table('health_records')
            ->select('health_records.*', 'patient_users.name as patient_name', 'doctor_users.name as doctor_name')
            ->join('users as patient_users', 'health_records.patient_id', '=', 'patient_users.id')
            ->join('doctors', 'health_records.doctor_id', '=', 'doctors.id')
            ->join('users as doctor_users', 'doctors.user_id', '=', 'doctor_users.id')
            ->orderBy('health_records.created_at', 'desc')
            ->where('patient_id', $patient->id)
            ->limit(10)
            ->get();

        // Query untuk menampilkan jumlah antrian yang dibuat
        $totalQueues = DB::table('queues')->where('patient_id', $patient->id)->count();

        // Query untuk menampilkan list poli antrian yang baru dikunjungi
        $recentlyVisitedPolis = DB::table('queues')
            ->select('polyclinics.name', 'queues.queued_at')
            ->join('doctors', 'queues.doctor_id', '=', 'doctors.id')
            ->join('polyclinics', 'doctors.polyclinic_id', '=', 'polyclinics.id')
            ->orderBy('queues.queued_at', 'desc')
            ->where('patient_id', $patient->id)
            ->limit(10)
            ->get();

        // Ambil tanggal dari input form atau default ke hari ini
        $date = $request->input('date', Carbon::today()->format('Y-m-d'));

        // Query untuk mencari ketersediaan antrian pada poli tertentu pada tanggal yang diberikan
        $availability = DB::table('queues')
            ->select('doctors.polyclinic_id', 'polyclinics.name', DB::raw('COUNT(queues.id) as queue_count'))
            ->join('doctors', 'queues.doctor_id', '=', 'doctors.id')
            ->join('polyclinics', 'doctors.polyclinic_id', '=', 'polyclinics.id')
            ->whereDate('queues.queued_at', '=', $date)
            ->groupBy('doctors.polyclinic_id', 'polyclinics.name')
            ->get();

        $polyclinics = Polyclinic::select('id', 'name')->get();

        $latestQueues = DB::table('queues')
            ->select(
                'queues.id',
                'queues.queued_at',
                'users.name as doctor_name',
                'users.email as doctor_email',
                'doctors.photo as doctor_photo',
                'patients.photo as patient_photo',
                'polyclinics.name as polyclinic_name',
            )
            ->join('patients', 'queues.patient_id', '=', 'patients.id')
            ->join('doctors', 'queues.doctor_id', '=', 'doctors.id')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->join('polyclinics', 'doctors.polyclinic_id', '=', 'polyclinics.id')
            ->orderBy('queued_at', 'desc')
            ->where('patient_id', $patient->id)
            ->get();

        return view('patient.index', compact('user', 'date', 'polyclinics', 'availability', 'latestQueues', 'mostPopularDoctors', 'latestAppointments', 'latestHealthRecords', 'totalQueues', 'recentlyVisitedPolis'));
    }
}

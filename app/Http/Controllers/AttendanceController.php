<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $currentTime = now('asia/jakarta')->format('D, d M Y | H:i:s');
        $attendances = Attendance::with('doctor')->where('doctor_id', $user->doctor->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('attendance.index', compact('attendances', 'user', 'currentTime'));
    }
    public function checkIn()
    {
        $currentTime = now('asia/jakarta')->format('H:i:s');
        // $currentTime = now('asia/jakarta')->setHour(8)->format('H:i:s');

        // Cek apakah waktu saat ini berada di rentang 08:00 - 09:00
        if ($currentTime < '08:00:00' || $currentTime > '09:00:00') {
            return redirect()->back()->withErrors(['msg' => 'Hanya dapat attend masuk antara jam 08:00 - 09:00.']);
        }

        $doctorId = auth()->user()->doctor->id;
        $attendance = Attendance::where('doctor_id', $doctorId)
            ->whereDate('date', today())
            ->first();

        if (!$attendance) {
            $attendance = new Attendance();
            $attendance->doctor_id = $doctorId;
            $attendance->date = now('asia/jakarta')->toDateString();
        }

        $attendance->check_in_time = $currentTime;
        $attendance->save();

        return redirect()->back()->with('success', 'Attend masuk berhasil.');
    }

    public function checkOut()
    {
        $currentTime = now('asia/jakarta')->format('H:i:s');
        // $currentTime = now('asia/jakarta')->setHour(18)->format('H:i:s');

        // Cek apakah waktu saat ini berada di rentang 20:00 - 21:00
        if ($currentTime < '20:00:00' || $currentTime > '21:00:00') {
            return redirect()->back()->withErrors(['msg' => 'Hanya dapat attend keluar antara jam 20:00 - 21:00.']);
        }

        $doctorId = auth()->user()->doctor->id;
        $attendance = Attendance::where('doctor_id', $doctorId)
            ->whereDate('date', today())
            ->first();

        if (!$attendance || !$attendance->check_in_time) {
            return redirect()->back()->withErrors(['msg' => 'Anda harus attend masuk terlebih dahulu sebelum dapat attend keluar.']);
        }

        if ($attendance) {
            $attendance->check_out_time = $currentTime;
            $attendance->save();
        }

        return redirect()->back()->with('success', 'Attend keluar berhasil.');
    }
}

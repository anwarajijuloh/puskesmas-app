<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Polyclinic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QueueController extends Controller
{
    public function index($poli_id = null)
    {
        $today = Carbon::today();
        $poli_id = $poli_id ?? Polyclinic::first()->id;
        $poli_name = Polyclinic::where('id', $poli_id)->first()->name;
        $queues = Queue::with('doctor', 'patient', 'polyclinic')
            ->where('polyclinic_id', $poli_id)
            ->whereDate('queued_at', $today)
            ->orderBy('queued_at', 'desc')
            ->get();
        $polis = Polyclinic::all();
        return view('queues.index', compact('polis', 'queues', 'poli_id', 'poli_name', 'today'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'queued_at' => 'required|date|date_format:Y-m-d',
        ]);
        // /**  @var \App\Models\User */
        $user = Auth::user();
        $patient = Patient::where('user_id', $user->id)->first();
        $doctor = Doctor::where('polyclinic_id', $request->poli_id)->inRandomOrder()->first();
         
        // waktu operasional pendaftaran online setiap poli
        $queuedAt = Carbon::createFromFormat('Y-m-d', $request->input('queued_at'));
        $startTime = $queuedAt->copy()->setHours(8)->setMinute(0);
        $endTime = $queuedAt->copy()->setHours(12)->setMinute(0);
        // dd($startTime, $endTime);
                
        // Cek jika poli tersebut sudah memiliki 5 antrian pada hari yang sama
        $existingQueueCount = Queue::whereDate('queued_at', $queuedAt->toDateString())
            ->where('polyclinic_id', $request->input('poli_id'))
            ->count();

        if ($existingQueueCount >= 5) {
            return back()->withErrors(['msg' => 'Antrian untuk poli ini sudah penuh.']);
        }

        // Cek jika user sudah memiliki 1 antrian pada poli yang sama
        $existingUserQueue = Queue::whereDate('queued_at', $queuedAt->toDateString())
            ->where('patient_id', $request->input('patient_id'))
            ->where('polyclinic_id', $request->input('poli_id'))
            ->first();

        if ($existingUserQueue) {
            return back()->withErrors(['msg' => "Already booked for this poli"]);
        }

        // Menentukan waktu antrian berikutnya
        $lastQueue = Queue::whereDate('queued_at', $queuedAt->toDateString())
            ->where('polyclinic_id', $request->input('poli_id'))
            ->orderBy('queued_at', 'desc')
            ->first();

        $nextQueueTime = $lastQueue ? Carbon::parse($lastQueue->queued_at)->addMinutes(30) : $startTime;

        if ($nextQueueTime->greaterThan($endTime)) {
            $endTimeFormatted = $endTime->format('H:i');
            $endDateFormatted = $endTime->format('D, d M');
            return back()->withErrors(['msg' => "Antrian untuk tanggal $endDateFormatted ini tutup pada $endTimeFormatted."]);
        }
        $currentLocalTime = Carbon::now('Asia/Jakarta');
        if ($currentLocalTime->greaterThan($nextQueueTime)) {
            return back()->withErrors(['msg' => "Melebihi jam operasional, pilih hari selanjutnya"]);
        }

        $queue = new Queue();
        $queue->patient_id = $patient->id;
        $queue->doctor_id = $doctor->id;
        $queue->polyclinic_id = $request->poli_id;
        $queue->priority = $request->priority;
        $queue->queued_at = $nextQueueTime;
        $queue->save();

        return redirect()->back()->with('success', 'Book queued successfully!');
    }
    public function destroy(Request $request)
    {
        $queue = Queue::find($request->id);
        if ($queue && $queue->patient_id == Auth::user()->patient->id) {
            $queue->delete();
            return redirect()->back()->with('success', 'Queue deleted successfully!');
        }
        return redirect()->back()->with('error', 'You are not authorized to delete this queue!');
    }
}

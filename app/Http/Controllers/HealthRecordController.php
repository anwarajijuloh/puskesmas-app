<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\HealthRecord;
use App\Models\Patient;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->role == 'patient')
        {
            $doctors = Doctor::all();
            $query = HealthRecord::query();
    
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }
    
            if ($request->filled('diagnosis')) {
                $query->where('diagnosis', 'like', '%' . $request->diagnosis . '%');
            }
    
            if ($request->filled('doctor_id')) {
                $query->where('doctor_id', $request->doctor_id);
            }
    
            $healthRecords = $query->with('doctor', 'patient')->where('patient_id', auth()->user()->patient->id)->orderBy('created_at', 'desc')->paginate(10);
            return view('healthrecord.index', compact('healthRecords', 'doctors'));
        } elseif (auth()->user()->role == 'doctor') {
            $user = auth()->user();
            $patients = Patient::all();
            $query = HealthRecord::query();
    
            if ($request->filled('start_date') && $request->filled('end_date')) {
                $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }
    
            if ($request->filled('diagnosis')) {
                $query->where('diagnosis', 'like', '%' . $request->diagnosis . '%');
            }
    
            if ($request->filled('patient_id')) {
                $query->where('patient_id', $request->patient_id);
            }
    
            $healthRecords = $query->with('doctor', 'patient')->where('doctor_id', auth()->user()->doctor->id)->orderBy('created_at', 'desc')->paginate(10);
            return view('healthrecord.index', compact('healthRecords', 'patients', 'user'));
        }
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'diagnosis' =>'required|string',
            'recipient' =>'required|string',
        ]);

        HealthRecord::create([
            'doctor_id' => auth()->user()->doctor->id,
            'patient_id' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'recipient' => $request->recipient,
        ]);

        return redirect()->back()->with('success', 'Health record created successfully');
    }
}

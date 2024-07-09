<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request, $sender_id = null)
    {
        if (auth()->user()->role == 'patient'){
            $userId = Auth::user()->id;
            $doctors = Doctor::all();
            $sender_id = $sender_id ?? $doctors->where('user_id', $sender_id)->first();
    
            $messages = $messages = Message::where(function ($query) use ($sender_id) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $sender_id)->with('users', 'patients');
            })->orWhere(function ($query) use ($sender_id) {
                $query->where('sender_id', $sender_id)->where('receiver_id', Auth::id())->with('users', 'doctors');
            })->orderBy('sent_at')->get();
    
            $senders = Message::where('sender_id', Auth::id())
                ->select('receiver_id')
                ->distinct()
                ->with('receiver')
                ->get()
                ->pluck('receiver');
    
            $doctor = Doctor::where('user_id', $sender_id)->first();
            $patient = Patient::where('user_id', $userId)->first();
    
            return view('message.index', compact('doctors', 'doctor', 'patient', 'messages', 'senders', 'sender_id'));
        }elseif (auth()->user()->role == 'doctor'){
            $user = Auth::user();
            $patients = Patient::all();
            $sender_id = $sender_id ?? $patients->where('user_id', $sender_id)->first();
    
            $messages = $messages = Message::where(function ($query) use ($sender_id) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $sender_id)->with('users', 'patients');
            })->orWhere(function ($query) use ($sender_id) {
                $query->where('sender_id', $sender_id)->where('receiver_id', Auth::id())->with('users', 'doctors');
            })->orderBy('sent_at', 'asc')->get();
    
            $senders = Message::where('receiver_id', Auth::id())
                ->select('sender_id')
                ->distinct()
                ->with('sender')
                ->get()
                ->pluck('sender');
    
            $doctor = Doctor::where('user_id', $user->id)->first();
            $patient = User::where('id', $sender_id)->first();
    
            return view('message.index', compact('user', 'patients', 'doctor', 'patient', 'messages', 'senders', 'sender_id'));
        }
    }

    public function store(Request $request)
    {
        // dd($request);
        if (auth()->user()->role == 'patient'){

            $request->validate([
                'receiver_id' => 'required|exists:users,id',
                'message' => 'required',
            ]);
    
            Message::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);
    
            return redirect()->back();
        }elseif (auth()->user()->role == 'doctor'){
            $request->validate([
                'receiver_id' => 'required|exists:users,id',
                'message' => 'required',
            ]);
    
            Message::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);
    
            return redirect()->back();
        }
    }
}

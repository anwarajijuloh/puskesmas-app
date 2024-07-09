<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function resetpass()
    {
        return view('auth.reset-password');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'patient';
            $user->save();

            $patient = new Patient();
            $patient->user_id = $user->id;
            $patient->photo = 'assets/images/blank-profile.jpg';
            $patient->save();

            return redirect()->route('login')->with('success', 'Registration Successfully!');
        }else {
            return redirect()->route('register')->withInput()->withErrors($validator);
        }
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->passes()) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $token = md5(time().$user->email);
                $user->remember_token = $token;
                $user->save();

                $url = route('reset.password.verify', ['token' => $token]);
                // Send email to user with the verification link
                // Example:
                // Mail::to($user->email)->send(Mailable($url));
                //...

                return redirect()->route('reset.password.success')->with('success', 'Reset password link has been sent to your email.');
            } else {
                return redirect()->route('reset.password')->with('error', 'Email not found.');
            }
        } else {
            return redirect()->route('reset.password')->withInput()->withErrors($validator);
        }
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                
                if(Auth::user()->role === 'patient')
                {
                    return redirect()->route('patient.dashboard');
                } else if(Auth::user()->role === 'doctor')
                {
                    return redirect()->route('doctor.dashboard');
                } else if(Auth::user()->role === 'admin')
                {
                    return redirect()->route('admin.dashboard');
                }

            } else {
                return redirect()->route('login')->with('error', 'Email atau Password salah!');
            }
        } else {
            return redirect()->route('login')->withInput()->withErrors($validator);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPasien()
    {
        $title = 'Login Pasien';
        return view('pasiens.login', compact('title'));
    }
    public function authPasien(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('pasien.dashboard');
            } else {
                return redirect()->route('pasien.login')->with('error', 'Email or password is incorrect');
            }
        } else {
            return redirect()->route('pasien.login')->withInput()->withErrors($validator);
        }
    }
    public function loginDokter()
    {
        $title = 'Login Dokter';
        return view('dokters.login', compact('title'));
    }
    public function authDokter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if(Auth::guard('dokter')->attempt(['email' => $request->email, 'password' => $request->password])){
                if(Auth::guard('dokter')->user()->role != 'dokter') {
                    Auth::guard('dokter')->logout();
                    return redirect()->route('dokter.login')->with('error', 'You do not have permission to access this page');
                }
                return redirect()->route('dokter.dashboard')->with('success', 'login successfully!');
            } else {
                return redirect()->route('dokter.login')->with('error', 'Email or password is incorrect');
            }
        } else {
            return redirect()->route('dokter.login')->withInput()->withErrors($validator);
        }
    }
    public function register()
    {
        $title = 'Register Pasien';
        return view('pasiens.register', compact('title'));
    }
    public function authRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =  Hash::make($request->password);
            $user->role = 'pasien';
            $user->save();

            return redirect()->route('pasien.login')->with('success', 'You have registered succesfully!');
        } else {
            return redirect()->route('pasien.register')->withInput()->withErrors($validator);
        }
    }
    public function logoutPasien()
    {
        Auth::logout();
        return redirect()->route('pasien.login')->with('success', 'You have logged out succesfully!');
    }
    public function logoutDokter()
    {
        Auth::guard('dokter')->logout();
        return redirect()->route('dokter.login')->with('success', 'You have logged out succesfully!');
    }
    public function dashboardPasien()
    {
        $title = 'Dashboard Pasien';
        return view('pasiens.index', compact('title'));
    }
    public function dashboardDokter()
    {
        $title = 'Dashboard Dokoter';
        return view('dokters.index', compact('title'));
    }
}

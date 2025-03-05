<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorManagerController extends Controller
{
    public function doctorLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::guard('doctor')->attempt($credentials)) {
                return redirect()->route('doctor.dashboard');
            }

            return back()->withErrors(['email' => ' Invalid credentials']);
        }

        return view("doctor.auth.login");
    }

    public function doctorRegister(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors',
                'password' => 'required|min:6|confirmed',
            ]);

            $data['password'] = Hash::make($data['password']);
            $doctor = Doctor::create($data);

            Auth::guard('doctor')->login($doctor);

            return redirect()->route('doctor.dashboard');
        }

        return view('doctor.auth.register');
    }
    public function doctorLogout(Request $request)
    {
        if (Auth::guard('doctor')->check()) {
            Auth::guard('doctor')->logout();
        } else {
            Auth::logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->route('doctorLogin');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        $appointments = Appointments::where('doctor_id', Auth::guard('doctor')->user()->id)->get();
        $patients = User::whereIn('id', $appointments->pluck('user_id'))->get();
        return view("doctor.index", compact("appointments", "patients"));
    }
    public function profile($id)
    {
        $id = Auth::guard('doctor')->user()->id;
        $doctor = Doctor::where('id', $id)->first();
        return view("doctor.profile", compact("id", 'doctor'));
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'bio' => 'required',
            'bioGraphy' => 'required',
            'phoneNumber' => 'required',
            'major' => 'required',
            'country' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif', // التأكد من نوع الصورة وحجمها
        ]);

        $inputs = $request->except(['image', '_token']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = 'assets/images/' . $image_name;

            $image->move(public_path('assets/images/'), $image_name);

            $inputs['image'] = $path;
        }

        Doctor::where('id', $id)->update($inputs);

        return redirect()->route('doctor.profile', $id)->with('success', 'Profile updated successfully');
    }



    public function cancelAppointment($appointmentId)
    {
        $appointment = Appointments::findOrFail($appointmentId);
        $appointment->state = 'canceled';
        $appointment->delete();
        $appointment->save();

        return redirect()->route('doctor.dashboard')->with('success', 'Appointment canceled successfully');
    }

    public function acceptAppointment($appointmentId)
    {
        $appointment = Appointments::findOrFail($appointmentId);
        $appointment->state = 'confirmed';
        $appointment->save();

        return redirect()->route('doctor.dashboard')->with('success', 'Appointment confirmed successfully');
    }
    public function acceptedAppointments()
    {
        $appointments = Appointments::all();

        return view('doctor.appointments', compact('appointments'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctor = Doctor::all();
        $patientId = Auth::user()->id;
        $appointments = Appointments::where("user_id", $patientId)->get();
        return view('user.index', compact('doctor', 'appointments'));
    }
    public function show(Doctor $doctor, $id)
    {
        $doctor = $doctor->where('id', $id)->first();
        return view('doctor.show', compact('doctor'));
    }
    public function showDoctors(Doctor $doctor)
    {
        $doctors = $doctor->all();
        return view('user.showDoctors', compact('doctors'));
    }
    public function profile($id)
    {
        $id = Auth::user()->id;
        $patient = User::where('id', $id)->first();
        return view("user.profile", compact("id", 'patient'));
    }
    public function booking(Doctor $doctor, $id)
    {
        $doctor = $doctor->where('id', $id)->first();
        return view("user.book", compact('doctor'));
    }
    public function doneBooking(Appointments $booking)
    {
        $booking = $booking->latest()->get();
        return view("user.doneBooking", compact("booking"));
    }
    public function makeBook(Request $request, $doctorId)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $patientId = Auth::id();
        $doctor = Doctor::findOrFail($doctorId);


        $booking = Appointments::create([
            'date' => $request->date,
            'time' => $request->time,
            'doctor_id' => $doctor->id,
            'user_id' => $patientId,
        ]);

        return redirect()->route('patient.doneBooking')->with('success', 'Booking created successfully');
    }


    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'dateOfBirth' => 'required',
            'bloodGroup' => 'required',
            'phoneNumber' => 'required',
            'country' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048', // التأكد من نوع الصورة وحجمها
        ]);

        $inputs = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = 'assets/images/' . $image_name;

            $image->move(public_path('assets/images/'), $image_name);

            $inputs['image'] = $path;
        }
        User::where('id', $id)->update($inputs);

        return redirect()->route('patient.profile', $id)->with('success', 'Profile updated successfully');
    }
    public function cancelBook($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->delete();
        return redirect()->route('patient.dashboard')->with('success', 'Appointment cancelled successfully.');
    }


}

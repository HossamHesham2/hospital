<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class DoctorSidebar extends Component
{
    public $doctor;

    public function __construct()
    {
        $this->doctor = Auth::guard('doctor')->user();
    }

    public function render()
    {
        return view('components.doctor-sidebar');
    }
}

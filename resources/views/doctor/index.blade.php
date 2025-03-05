@extends('doctor.layouts.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <x-doctor-sidebar />
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card dash-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-6">
                                            <div class="dash-widget dct-border-rht">
                                                <div class="circle-bar circle-bar1">
                                                    <div class="circle-graph1" data-percent="75">
                                                        <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Total Patient</h6>
                                                    <h3>{{ $appointments->where('doctor_id', Auth::guard('doctor')->user()->id)->count() }}
                                                    </h3>
                                                    <p class="text-muted">Till Today</p>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12 col-lg-6">
                                            <div class="dash-widget">
                                                <div class="circle-bar circle-bar3">
                                                    <div class="circle-graph3" data-percent="50">
                                                        <img src="{{ asset('assets_front/img/icon-03.png') }}"
                                                            class="img-fluid" alt="Patient">
                                                    </div>
                                                </div>
                                                <div class="dash-widget-info">
                                                    <h6>Appointments</h6>
                                                    <h3>
                                                        @php
                                                            $pendingAppointmentsCount = $appointments
                                                                ->where('state', 'confirmed')
                                                                ->where('doctor_id', Auth::guard('doctor')->user()->id)
                                                                ->count();
                                                        @endphp
                                                        {{ $pendingAppointmentsCount }}
                                                    </h3>
                                                    <p class="text-muted">
                                                        @if ($appointments->count() > 0)
                                                            {{ \Carbon\Carbon::parse($appointments->first()->date)->format('d, M Y') }}
                                                        @else
                                                            No Appointments
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Patient Appoinment</h4>
                            <div class="appointments">
                                <!-- Appointment List -->
                                @foreach ($appointments as $appointment)
                                    @if ($appointment->state == 'pending')
                                        <div class="appointment-list">
                                            <div class="profile-info-widget">
                                                <a href="patient-profile.html" class="booking-doc-img">
                                                    <img src="{{ asset('') . $appointment->user->image }}" alt="User Image">
                                                </a>
                                                <div class="profile-det-info">
                                                    <h3><a href="patient-profile.html">{{ $appointment->user->name }}</a>
                                                    </h3>
                                                    <div class="patient-details">
                                                        <h5><i class="far fa-clock"></i>
                                                            {{ \Carbon\Carbon::parse($appointments->first()->date)->format('d M Y') . ' ' . \Carbon\Carbon::parse($appointments->first()->time)->format('h:i A') }}
                                                        </h5>
                                                        <h5><i class="fas fa-map-marker-alt"></i>
                                                            {{ $appointment->user->country }}</h5>
                                                        <h5><i class="fas fa-envelope"></i>
                                                            {{ $appointment->user->email }}
                                                        </h5>
                                                        <h5 class="mb-0"><i class="fas fa-phone"></i>
                                                            {{ $appointment->user->phoneNumber }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="appointment-action">

                                                <form action="{{ route('accept.appointment', $appointment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm m-1 bg-success-light">
                                                        <i class="fas fa-check"></i> Accept
                                                    </button>
                                                </form>
                                                <form action="{{ route('cancel.appointment', $appointment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm m-1 bg-danger-light">
                                                        <i class="fas fa-times"></i> Cancel
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection

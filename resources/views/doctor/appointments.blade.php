@extends('doctor.layouts.layout')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">


                    <!-- Profile Sidebar -->
                    <x-doctor-sidebar />
                    <!-- /Profile Sidebar -->
                </div>

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <h2 class="text-center my-3">Accepted Appointments</h2>
                    <div class="appointments">

                        <!-- Appointment List -->
                        @if ($appointments)
                            @foreach ($appointments as $appointment)
                                @if ($appointment->state == 'confirmed')
                                    <div class="appointment-list">
                                        <div class="profile-info-widget">
                                            <a href="patient-profile.html" class="booking-doc-img">
                                                <img src="{{ asset('') . $appointment->user->image }}" alt="User Image">
                                            </a>
                                            <div class="profile-det-info">
                                                <h3><a href="patient-profile.html">{{ $appointment->user->name }}</a></h3>
                                                <div class="patient-details">
                                                    <h5><i class="far fa-clock"></i>
                                                        {{ \Carbon\Carbon::parse($appointments->first()->date)->format('d M Y') . ' ' . \Carbon\Carbon::parse($appointments->first()->time)->format('h:i A') }}
                                                    </h5>
                                                    <h5><i class="fas fa-map-marker-alt"></i>
                                                        {{ $appointment->user->country }}</h5>
                                                    <h5><i class="fas fa-envelope"></i> {{ $appointment->user->email }}</h5>
                                                    <h5 class="mb-0"><i class="fas fa-phone"></i>
                                                        {{ $appointment->user->phoneNumber }}</h5>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p class="text-center">No appointments found.</p>
                        @endif

                        <!-- /Appointment List -->



                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection

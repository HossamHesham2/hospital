@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="content success-page-cont">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">

                                <i class="fas fa-check"></i>
                                <h3>Appointment booked Successfully!</h3>
                                <p>Appointment booked with <strong> Dr. {{ $booking->first()->doctor->name }} </strong><br>
                                    on <strong>{{ $booking->first()->date }}
                                        {{ $booking->first()->time }}</strong></p>
                                <a href="{{ route('doctor.showDoctors') }}" class="btn btn-primary view-inv-btn">Go To
                                    Doctors</a>

                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection

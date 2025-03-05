@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="doctor-profile.html" class="booking-doc-img">
                                    <img src="{{ asset('') . $doctor->image }}" alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="doctor-profile.html">Dr. {{ $doctor->name }}</a></h4>

                                    <p class="text-muted mb-3"><i class="fas fa-map-marker-alt"></i> {{ $doctor->country }}
                                    </p>
                                    <p class="doc-location">
                                        <i class="far fa-money-bill-alt"></i> {{ $doctor->price }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('patient.makeBook' , $doctor->id ) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Choose your Appointment Date</h3>
                                        <input type="date" class="form-control" required name="date">
                                        @error('date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Choose your Appointment Time</h3>
                                        <input type="time" class="form-control" required name="time">
                                        @error('time')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Schedule Widget -->

                        <!-- /Schedule Widget -->

                        <!-- Submit Section -->
                        <div class="submit-section proceed-btn text-right">
                            <button type="submit" class="btn btn-primary submit-btn">Make Appointment</button>
                        </div>
                        <!-- /Submit Section -->
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection

@extends('user.layouts.layout')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <!-- Profile Sidebar -->
                <x-user-side-bar />
                <!-- / Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body pt-0">

                            <!-- Tab Menu -->
                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments"
                                            data-toggle="tab">Appointments</a>
                                    </li>

                                </ul>
                            </nav>
                            <!-- /Tab Menu -->

                            <!-- Tab Content -->
                            <div class="tab-content pt-0">

                                <!-- Appointment Tab -->
                                <div id="pat_appointments" class="tab-pane fade show active">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Doctor</th>
                                                            <th>Appt Date</th>
                                                            <th>Booking Date</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @if (! $appointments->IsEmpty())
                                                            @foreach ($appointments as $appointment)
                                                                <tr>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="doctor-profile.html"
                                                                                class="avatar avatar-sm mr-2">
                                                                                <img class="avatar-img rounded-circle"
                                                                                    src="{{ asset('') . $appointment->doctor->image }}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="doctor-profile.html">{{ $appointment->doctor->name }}
                                                                                <span>{{ $appointment->doctor->bio }}</span></a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($appointments->first()->date)->format('d M Y') }}
                                                                        <span
                                                                            class="d-block text-info">{{ \Carbon\Carbon::parse($appointments->first()->time)->format('h:i A') }}</span>
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($appointments->first()->date)->format('d M Y') }}
                                                                    </td>
                                                                    <td>{{ $appointment->doctor->price }}</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-pill  bg-{{ $appointment->state == 'confirmed' ? 'success-light' : ($appointment->state == 'canceled' ? 'danger-light' : 'warning-light') }}">
                                                                            {{ $appointment->state }}
                                                                        </span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <div class="table-action">
                                                                            <form
                                                                                action="{{ route('patient.cancelBook', $appointment->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-sm bg-danger-light">
                                                                                    <i class="far fa-trash-alt"></i> Cancel
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr >
                                                                <td colspan="6" class="text-center">No appointments found</td>
                                                            </tr>
                                                        @endif



                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Appointment Tab -->


                            </div>
                            <!-- Tab Content -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

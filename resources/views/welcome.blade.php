@extends('layouts.app')
@section('content')
    <section class="section section-search" style="height: 80vh ;">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Choose Doctor, Make an Appointment</h1>
                    <p>Discover the best Doctors nearest to you.</p>
                </div>

                <div class="text-center login-link">
                    @if (Auth::guard('doctor')->check())
                        {{-- المستخدم مسجّل دخول كطبيب --}}
                        <a href="{{ route('doctor.dashboard') }}" class="btn btn-success btn-lg px-5 mt-5">Go to Your
                            Dashboard (Doctor)</a>
                    @elseif (Auth::check())
                        {{-- المستخدم مسجّل دخول كمريض أو مستخدم عادي --}}
                        <a href="{{ route('patient.dashboard') }}" class="btn btn-success btn-lg px-5 mt-5">Go to Your
                            Dashboard (Patient)</a>
                    @else
                        {{-- المستخدم غير مسجّل الدخول --}}
                        @if (Route::has('login') || Route::has('doctorLogin'))
                            <a href="{{ route('login') }}" class="btn btn-success btn-lg px-5 mt-5">Login</a>
                        @endif
                        @if (Route::has('register') || Route::has('doctorRegister'))
                            <a href="{{ route('register') }}" class="btn btn-success btn-lg px-5 mt-5">Register</a>
                        @endif
                    @endif
                </div>
                <!-- Search -->

                <!-- /Search -->

            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="{{ asset('assets_front/img/login-banner.png') }}" class="img-fluid" alt="Doccure Register">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                            <div class="login-header">
                                <h3>Patient Register <a href="{{ route('doctorLogin') }}">Are you a Doctor?</a></h3>
                            </div>

                            <!-- Register Form -->
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group form-focus">
                                    <input type="text" value="{{ old('name') }}"
                                        class="form-control floating @error('name') is-invalid @enderror"
                                        name="name">
                                    <label class="focus-label">Name</label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-focus">
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control floating @error('email') is-invalid @enderror"
                                        name="email">
                                    <label class="focus-label">Email Address</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" class="form-control floating @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                    <label class="focus-label">Create Password</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-focus">
                                    <input type="password" value="{{ old('password_confirmation') }}" class="form-control floating @error('password_confirmation') is-invalid @enderror"  name="password_confirmation">
                                    <label class="focus-label">Password Confirmation</label>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    <a class="forgot-link" href="{{ route('doctorLogin') }}">Already have an
                                        account?</a>
                                </div>
                                <button class="btn btn-primary btn-block btn-lg login-btn"
                                    type="submit">Signup</button>

                            </form>
                            <!-- /Register Form -->

                        </div>
                    </div>
                </div>
                <!-- /Register Content -->

            </div>
        </div>

    </div>

</div>
@endsection

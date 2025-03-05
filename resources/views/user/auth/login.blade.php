@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ asset('assets_front/img/login-banner.png') }}" class="img-fluid"
                                    alt="Doccure Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Login  PAITIENT</h3>
                                </div>
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <input type="email" name="email"
                                            class="form-control floating @error('email') is-invalid @enderror">
                                        <label class="focus-label">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <input type="password" name="password"
                                            class="form-control floating @error('email') is-invalid @enderror">
                                        <label class="focus-label">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>


                                    <div class="text-center dont-have">Don’t have an account ? <a
                                            href="{{ route('register') }}">Register</a></div>
                                    <div class="text-center dont-have">Are You a Doctor ? <a
                                            href="{{ route('doctorLogin') }}">Login</a></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
@endsection

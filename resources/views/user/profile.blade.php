@extends('user.layouts.layout')
@section('content')
    @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
            <div id="successToast" class="toast show align-items-center text-white bg-success border-0 shadow" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let toastEl = document.getElementById('successToast');
                if (toastEl) {
                    setTimeout(() => {
                        toastEl.style.transition = "opacity 1s ease";
                        toastEl.style.opacity = "0";
                        setTimeout(() => {
                            toastEl.remove();
                        }, 3000); // بعد انتهاء التلاشي
                    }, 3000); // يبقى ظاهر لمدة 3 ثواني ثم يبدأ التلاشي
                }
            });
        </script>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Profile Sidebar -->
                <x-user-side-bar />
                <!-- /Profile Sidebar -->

                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body">

                            <!-- Profile Settings Form -->
                            <form action="{{ route('patient.profile_update', $patient->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row form-row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{asset(''). $patient->image }}" alt="User Image">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="image">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                        2MB</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{ $patient->email }}"
                                                name="email" readonly>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ $patient->name ?? old('name') }}" name="name">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Date Of Birth</label>
                                            <input type="date" class="form-control"
                                                value="{{ $patient->dateOfBirth ?? old('dateOfBirth') }}"
                                                name="dateOfBirth">
                                                @error('dateOfBirth')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <select class="form-control select" name="bloodGroup">
                                                <option value="{{ $patient->bloodGroup ?? old('bloodGroup') }}">
                                                    {{ $patient->bloodGroup ?? 'Select Blood' }}</option>
                                                <option value="A-">A-</option>
                                                <option value="A+">A+</option>
                                                <option value="B-">B-</option>
                                                <option value="B+">B+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                            </select>
                                            @error('bloodGroup')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" value="{{ $patient->phoneNumber ?? old('phoneNumber') }}"
                                                class="form-control" name="phoneNumber">
                                                @error('phoneNumber')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input type="text" class="form-control"
                                                value="{{ $patient->country ?? old('country') }}" name="country">
                                                @error('country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                </div>
                            </form>
                            <!-- /Profile Settings Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

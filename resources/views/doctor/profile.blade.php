@extends('doctor.layouts.layout')
@section('content')
@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div id="successToast" class="toast show align-items-center text-white bg-success border-0 shadow"
            role="alert" aria-live="assertive" aria-atomic="true">
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
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <x-doctor-sidebar />
                    <!-- /Profile Sidebar -->

                </div>
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <form action="{{ route('doctor.profile_update', $doctor->id) }}" method="POST"
                        enctype="multipart/form-data">
                        <!-- Basic Information -->
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Basic Information</h4>
                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="change-avatar">
                                                <div class="profile-img">
                                                    <img src="{{ asset('').$doctor->image }}" alt="User Image">
                                                </div>
                                                <div class="upload-img">
                                                    <div class="change-photo-btn">
                                                        <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                        <input type="file" class="upload" name="image" value="{{ asset('').$doctor->image }}">
                                                    </div>
                                                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                        2MB</small>
                                                    @error('image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" readonly
                                                value="{{ $doctor->email }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $doctor->name ?? old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>bio <span class="text-danger">*</span></label>
                                            <input type="text" name="bio" class="form-control"
                                                value="{{ $doctor->bio ?? old('bio') }}">
                                            @error('bio')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phoneNumber" class="form-control"
                                                value="{{ $doctor->phoneNumber ?? old('phoneNumber') }}">
                                            @error('phoneNumber')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Major</label>
                                            <input type="text" name="major" class="form-control"
                                                value="{{ Auth::guard('doctor')->user()->major ?? old('major') }}">
                                            @error('major')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Country</label>
                                            <input type="text" name="country" class="form-control"
                                                value="{{ Auth::guard('doctor')->user()->country ?? old('country') }}">
                                            @error('country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Basic Information -->

                        <!-- About Me -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">About Me</h4>
                                <div class="form-group mb-0">
                                    <label>BioGraphy</label>
                                    <textarea class="form-control" name="bioGraphy" rows="5">{{ Auth::guard('doctor')->user()->bioGraphy ?? old('bioGraphy') }}</textarea>
                                    @error('bioGraphy')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- /About Me -->
                        <!-- Pricing -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pricing</h4>

                                <div class="form-group mb-0">
                                    <div id="pricing_select">
                                        <input type="text" class="form-control" id="custom_rating_input"
                                            name="price"
                                            value="{{ Auth::guard('doctor')->user()->price ?? old('price') }}"
                                            placeholder="20$">
                                        @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Pricing -->
                        <div class="submit-section submit-btn-bottom">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

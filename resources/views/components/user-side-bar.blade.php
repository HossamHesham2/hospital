<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{asset(''). $patient->image }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ $patient->name }}</h3>
                    <div class="patient-details">
                        @if (!empty($patient->dateOfBirth))
                            <h5><i class="fas fa-birthday-cake"></i> {{ $patient->dateOfBirth }}</h5>
                        @endif

                        @if (!empty($patient->country))
                            <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $patient->country }}</h5>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li>
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('doctor.showDoctors') }}">
                            <i class="fas fa-user-md"></i>
                            <span>Doctors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.profile' , $patient->id) }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="change-password.html">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>

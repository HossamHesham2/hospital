<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets_front/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets_front/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets_front/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_front/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets_front/css/style.css') }}">
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="{{ route('home') }}" class="navbar-brand logo">
                        <img src="{{ asset('assets_front/img/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="index.html" class="menu-logo">
                            <img src="{{ asset('assets_front/img/logo.png') }}" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav .header-navbar-rht">
                        @auth('doctor')
                            <li class="nav-item">
                                <a class="nav-link header-login" href="javascript:void(0);"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                    (Doctor)</a>
                                <form action="{{ route('doctorLogout') }}" id="logout-form" method="post"
                                    style="display: none">
                                    @csrf
                                </form>
                            </li>
                            @elseauth
                            <li class="nav-item ">
                                <a class="nav-link header-login" href="javascript:void(0);"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                    (Patient)</a>
                                <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
                                    @csrf
                                </form>
                            </li>
                        @endauth

                    </ul>
                </div>
            </nav>
        </header>
        <!-- /Header -->

        <!-- Home Banner -->
        @yield('content')
        <!-- /Home Banner -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets_front/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets_front/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets_front/js/bootstrap.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets_front/js/script.js') }}"></script>
</body>

</html>

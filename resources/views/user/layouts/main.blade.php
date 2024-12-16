<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sanggar Tabuh Leklok @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/user/img/logo-sanggar.png') }}" type="image/png">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/user/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/user/css/style.css') }}" rel="stylesheet">

    @if (Route::currentRouteName() === '/')
        <style>
            .nav-link {
                color: #cccccc !important;
            }

            .nav-link:hover {
                color: #D4A861 !important;
            }

            .nav-link.active {
                color: #D4A861 !important;
            }
        </style>
    @endif

    @stack('css')

</head>

<body
    @if (Route::currentRouteName() === '/') style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('assets/user/img/cover-video.jpg') }}'); background-repeat: no-repeat; background-size: cover;" @endif>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        {{-- <div class="spinner-grow text-primary" role="xstatus"></div> --}}
        <img src="{{ asset('assets/user/img/logo-sanggar.png') }}" width="150" alt="log sanggar">
    </div>
    <!-- Spinner End -->

    @include('user.components.navbar')

    @yield('content')

    @include('user.components.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    @stack('js')

    <!-- Template Javascript -->
    <script src="{{ asset('assets/user/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>

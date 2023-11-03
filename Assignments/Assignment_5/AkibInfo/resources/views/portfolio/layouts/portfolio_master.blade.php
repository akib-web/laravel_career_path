<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Resume Website Template Free Download</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Resume Website Template Free Download" name="keywords">
        <meta content="Resume Website Template Free Download" name="description">

        <!-- Favicon -->
        <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

        <!-- Google Fonts -->
        {{-- <link deffer href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet"> --}}

        <!-- CSS Libraries -->
        <link href="{{ asset('assets/bootstrap/4.4.1/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/fonts/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/slick/slick-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>


    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <div class="wrapper">
            @include('portfolio.templates.sidebar',$settings)
            <div class="content">
                @yield('profile_content')
            </div>
        </div>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/bootstrap/4.4.1/js/bootstrap.bundle.min.js') }}"></script> --}}
        <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
        <script src="{{ asset('assets/lib/typed/typed.min.js') }}"></script>
        <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>

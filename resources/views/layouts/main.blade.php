<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Logeen Acadimy | اكاديمية لوجين</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free courcess" name="keywords">
    <meta content="Free courcess" name="description">

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    @yield('css')

    <!-- Flaticon Font -->
    <link href="{{ url('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

    <!-- moving img-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .moving-image {
            position: relative;
            width: 100%;
            height: 100%;
            animation: move 5s ease-in-out infinite;
        }

        .moving-image img {
            width: 100%;
            height: auto;
        }

        @keyframes move {
            0% {
                transform: translateX(10%);
            }

            50% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(10%);
            }
        }
    </style>

</head>

<body>
    
    @include('layouts.navbar')
    
    @yield('content')
    
    @include('layouts.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="{{ url('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ url('assets/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ url('assets/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    @yield('js')
</body>

</html>
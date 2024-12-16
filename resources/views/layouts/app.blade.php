<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">
    
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
        <!-- Flaticon Font -->
        <link href="{{ url('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="{{ url('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
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
    </body>
</html>

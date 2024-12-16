<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Logeen Acadimy | اكاديمية لوجين</title>

    <!-- CSS files -->
    <link href="{{ url('assets/css/tabler.rtl.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
</head>

<body class=" layout-fluid">

    <div class="page">

        @include('admin.layouts.sidebar')

        <div class="page-wrapper">

            @include('admin.layouts.navbar')

            <!-- Page header -->
            <div class="page-header d-print-none" dir="rtl">
                <div class="container-xl">

                    @yield('content')

                </div>
            </div>
            <!-- Page body -->
        </div>
    </div>

    <!-- Libs JS -->
    <script src="{{ url('assets/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ url('assets/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ url('assets/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ url('assets/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ url('assets/js/tabler.min.js') }}" defer></script>
    <script src="{{ url('assets/js/demo.min.js') }}" defer></script>

    @yield('js')

</body>

</html>

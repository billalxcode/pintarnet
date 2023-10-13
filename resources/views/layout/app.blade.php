<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MasterApp</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body>
    <script src="{{ asset('assets/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
        <div class="page-wrapper">
            @yield('content')
            @include('layout.footer')
        </div>
    </div>
    @stack('modals')
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.js') }}"></script>

    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js?1684106062') }}" defer></script>

    <script src="{{ asset('assets/libs/clipboard/clipboard.js') }}"></script>
    @stack('scripts')
</body>

</html>

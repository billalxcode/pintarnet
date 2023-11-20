@extends('layout.ruangan.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="card card-md">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">Welcome {{ auth()->user()->name ?? 'Unknown' }}</h3>
                                    <div class="markdown text-muted">
                                        Selamat datang di aplikasi {{ config('app.name') }}. {{ config('app.name') }} adalah solusi canggih
                                        untuk mengelola informasi akademik dengan mudah dan efisien. Selamat menggunakan {{ config('app.name') }} untuk mengoptimalkan
                                        proses pendidikan Anda!
                                    </div>
                                    <div class="mt-3">
                                        <a href="https://billalxcode.my.id" class="btn btn-primary" target="_blank"
                                            rel="noopener">Donate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="card card-md">
                        <div class="card-header">
                            <h4 class="card-title">{{ $time_format_day ?? '' }}</h4>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <h4 id="greeting" class="placeholder col-3"></h4>
                            <h1 style="font-size:40px;" id="clock" class="placeholder col-5"></h1>
                        </div>
                    </div>
                </div>
                @include('layout.ruangan.data-information')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setGreeting() {
            const iconSunHigh = `
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-high" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M14.828 14.828a4 4 0 1 0 -5.656 -5.656a4 4 0 0 0 5.656 5.656z"></path>
            <path d="M6.343 17.657l-1.414 1.414"></path>
            <path d="M6.343 6.343l-1.414 -1.414"></path>
            <path d="M17.657 6.343l1.414 -1.414"></path>
            <path d="M17.657 17.657l1.414 1.414"></path>
            <path d="M4 12h-2"></path>
            <path d="M12 4v-2"></path>
            <path d="M20 12h2"></path>
            <path d="M12 20v2"></path>
            </svg>`
            const iconSunLow = `
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-low" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
            <path d="M4 12h.01"></path>
            <path d="M12 4v.01"></path>
            <path d="M20 12h.01"></path>
            <path d="M12 20v.01"></path>
            <path d="M6.31 6.31l-.01 -.01"></path>
            <path d="M17.71 6.31l-.01 -.01"></path>
            <path d="M17.7 17.7l.01 .01"></path>
            <path d="M6.3 17.7l.01 .01"></path>
            </svg>`
            const iconMoon = `
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
            </svg>`
            const hours = new Date().getHours()
            let status = (hours < 12) ? "Pagi " + iconSunLow :
                ((hours <= 18 && hours >= 12) ? "Siang " + iconSunHigh : "Malam " + iconMoon);
            $("#greeting").html("Selamat " + status)
        }

        $(document).ready(function() {
            $("#greeting").removeAttr("class")
            $("#clock").removeAttr("class")

            setGreeting()
            const interval = setInterval(() => {
                const d = new Date();
                const s = d.getSeconds()
                const m = d.getMinutes()
                const h = d.getHours()
                $("#clock").text(("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(
                    -2))
            }, 500)
        })
    </script>
@endpush

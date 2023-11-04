@extends('layout.operator.app')

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
                <div class="col-12">
                    <div class="card card-md">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h3 class="h1">Welcome {{ auth()->user()->name ?? 'Unknown' }}</h3>
                                    <div class="markdown text-muted">
                                        Selamat datang di aplikasi {{ config('app.name') }}. {{ config('app.name') }} adalah solusi canggih
                                        untuk mengelola informasi akademik dengan mudah dan efisien. Dengan fitur-fitur
                                        seperti pengelolaan siswa, ruangan, kehadiran, perizinan, dan buku tamu, aplikasi
                                        ini akan membantu institusi pendidikan Anda menjadi lebih terorganisir dan terfokus
                                        pada pengembangan akademik. Selamat menggunakan {{ config('app.name') }} untuk mengoptimalkan
                                        proses pendidikan Anda!
                                    </div>
                                    <div class="mt-3">
                                        <a href="https://github.com/billalxcode" class="btn btn-outline-primary"
                                            target="_blank" rel="noopener">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-heart-handshake" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                </path>
                                                <path
                                                    d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25">
                                                </path>
                                                <path d="M12.5 15.5l2 2"></path>
                                                <path d="M15 13l2 2"></path>
                                            </svg>
                                            Support</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layout.operator.data-information')

                <div class="col-12">
                    @include('partials.last-presents')
                </div>
            </div>
        </div>
    </div>
@endsection

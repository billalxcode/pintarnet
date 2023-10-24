@extends('layout.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Selamat datang di {{ config('app.name') }}</h1>
                </div>
                <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < $sliders->count(); $i++)
                            <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="{{ $i }}"
                                class="{{ $i == 0 ? 'active' : '' }}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @foreach ($sliders as $item)
                            <div class="carousel-item {{ $item === $sliders[0] ? 'active' : '' }}">
                                <img class="d-block w-100" alt=""
                                    src="{{ asset('storage/' . $item->storage->path) }}" />
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Menu</h3>
                </div>
                <div class="card-body">
                    <div class="row gap-1">
                        <div class="col-12 col-lg-2">
                            <a href="{{ route('guest.siswa.home') }}" class="card">
                                <div class="card-body">
                                    <p class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                        </svg>
                                        Siswa
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a href="{{ route('guest.tenaga-pendidik.home') }}" class="card">
                                <div class="card-body">
                                    <p class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                        </svg>
                                        Tenaga Pendidik
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a href="{{ route('guest.siswa.home') }}" class="card">
                                <div class="card-body">
                                    <p class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                        </svg>
                                        Tenaga Kependidikan
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-lg-2">
                            <a href="{{ route('guest.siswa.home') }}" class="card">
                                <div class="card-body">
                                    <p class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                        </svg>
                                        Ruangan
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

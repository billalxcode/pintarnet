<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::is('operator.home') ? 'active' : '' }}">
                        <a class="nav-link" href="./">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::is('operator.siswa.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('operator.siswa.home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Siswa
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Route::is('operator.user.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('operator.user.home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Users
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ Route::is('operator.tenaga-pendidik.home') ? 'active' : (Route::is('operator.tenaga-kependidikan.home') ? 'active' : '') }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Kependidikan
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Route::is('operator.tenaga-pendidik.home') ? 'active' : 'home' }}" href="{{ route('operator.tenaga-pendidik.home') }}">
                                Tenaga Pendidik
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.tenaga-kependidikan.home') ? 'active' : 'home' }}" href="{{ route('operator.tenaga-kependidikan.home') }}">
                                Tenaga Kependidikan
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.ruangan.home') ? 'active' : 'home' }}" href="{{ route('operator.ruangan.home') }}">
                                Ruangan
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Kehadiran
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('operator.kehadiran.home') }}">
                                Kelola Kehadiran
                            </a>
                            <a class="dropdown-item" href="./layout-boxed.html">
                                Kelola Perizinan
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                    <button class="btn btn-primary">Support</button>
                </div> -->
            </div>
        </div>
    </div>
</header>
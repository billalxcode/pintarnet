<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::is('operator.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('operator.home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
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
                    <li
                        class="nav-item dropdown {{ Route::is('operator.siswa.home') ? 'active' : (Route::is('operator.ruangan.home') ? 'active' : (Route::is('operator.mapel.home') ? 'active' : (Route::is('operator.japel.home') ? 'active' : (Route::is('operator.tenaga-pendidik.home') ? 'active' : (Route::is('operator.tenaga-kependidikan.home') ? 'active' : ''))))) }}">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-database-cog" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3">
                                    </path>
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3c.21 0 .42 -.003 .626 -.01"></path>
                                    <path d="M20 11.5v-5.5"></path>
                                    <path d="M4 12v6c0 1.657 3.582 3 8 3"></path>
                                    <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M19.001 15.5v1.5"></path>
                                    <path d="M19.001 21v1.5"></path>
                                    <path d="M22.032 17.25l-1.299 .75"></path>
                                    <path d="M17.27 20l-1.3 .75"></path>
                                    <path d="M15.97 17.25l1.3 .75"></path>
                                    <path d="M20.733 20l1.3 .75"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Data Utama
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Route::is('operator.japel.home') ? 'active' : '' }}"
                                href="{{ route('operator.japel.home') }}">
                                Jadwal Pelajaran
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.mapel.home') ? 'active' : '' }}"
                                href="{{ route('operator.mapel.home') }}">
                                Mata Pelajaran
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.ruangan.home') ? 'active' : '' }}"
                                href="{{ route('operator.ruangan.home') }}">
                                Ruangan
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.siswa.home') ? 'active' : '' }}"
                                href="{{ route('operator.siswa.home') }}">
                                Siswa
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.tenaga-pendidik.home') ? 'active' : '' }}"
                                href="{{ route('operator.tenaga-pendidik.home') }}">
                                Tenaga Pendidik
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.tenaga-kependidikan.home') ? 'active' : '' }}"
                                href="{{ route('operator.tenaga-kependidikan.home') }}">
                                Tenaga Kependidikan
                            </a>
                        </div>
                    </li>

                    <li class="nav-item {{ Route::is('operator.user.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('operator.user.home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                    width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Pengguna
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown {{ Route::is('operator.kehadiran.home') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path
                                        d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path
                                        d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path
                                        d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Kehadiran
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Route::is('operator.kehadiran.home') ? 'active' : '' }}"
                                href="{{ route('operator.kehadiran.home') }}">
                                Kelola Kehadiran
                            </a>
                            <a class="dropdown-item" href="./layout-boxed.html">
                                Kelola Perizinan
                            </a>
                        </div>
                    </li>
                    <li class="nav-item {{ Route::is('operator.storage.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('operator.storage.home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="44" height="44"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 4m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                    <path
                                        d="M3 12m0 3a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3z" />
                                    <path d="M7 8l0 .01" />
                                    <path d="M7 16l0 .01" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Penyimpanan
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-item dropdown {{ Route::is('operator.setting.page.home') ? 'active' : (Route::is('operator.setting.token.home') ? 'active' : '') }}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                    </path>
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Pengaturan
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ Route::is('operator.setting.page.home') ? 'active' : 'home' }}"
                                href="{{ route('operator.setting.page.home') }}">
                                Halaman
                            </a>
                            <a class="dropdown-item {{ Route::is('operator.setting.token.home') ? 'active' : 'home' }}"
                                href="{{ route('operator.setting.token.home') }}">
                                Integrasi
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

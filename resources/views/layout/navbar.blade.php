<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        @auth
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        @if ($notifications)
                        <span class="badge bg-red"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last notifications</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                @foreach ($notifications as $notification)
                                @if ($notification->type == "App\Notifications\RequestPerizinan")
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="#" data-bs-target="#modal-notification-{{ $notification->id }}" data-bs-toggle="modal" class="text-body d-block">Permintaan Izin</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Siswa dengan nama {{ $notification->data['nama_siswa'] }} dengan alasan {{ $notification->data['keterangan'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @push('modals')
                                <div class="modal modal-blur fade" id="modal-notification-{{ $notification->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Notifikasi Permintaan Izin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <p>Nama lengkap</p>
                                                        <p>Keterangan</p>
                                                        <p>Jenis Izin</p>
                                                        <p>Guru</p>
                                                    </div>
                                                    <div class="col-1">
                                                        <p>:</p>
                                                        <p>:</p>
                                                        <p>:</p>
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <p><b>{{ $notification->data['nama_siswa'] }}</b></p>
                                                        <p><b>{{ $notification->data['keterangan'] }}</b></p>
                                                        <p>
                                                            @if ($notification->data['jenis'] == 'keluar')
                                                            <span class="badge bg-warning"><b>{{ $notification->data['jenis'] }}</b></span>
                                                            @elseif ($notification->data['jenis'] == 'masuk')
                                                            <span class="badge bg-info"><b>{{ $notification->data['jenis'] }}</b></span>
                                                            @endif
                                                        </p>
                                                        <p><b>{{ auth()->user()->name }}</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endpush
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url('/assets/static/avatars/user.png')"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user()->name ?? 'Unknown' }}</div>
                        <div class="mt-1 small text-muted text-uppercase">
                            {{ auth()->user()->getRoleNames()[0] ?? 'Unknown' }}
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @if (Auth::user()->getRoleNames()[0] == 'operator')
                    <a href="{{ route('operator.home') }}" class="dropdown-item">Dashboard</a>
                    @elseif (Auth::user()->getRoleNames()[0] == 'ruangan')
                    <a href="{{ route('ruangan.home') }}" class="dropdown-item">Dashboard</a>
                    @elseif (Auth::user()->getRoleNames()[0] == 'pendidik')
                    <a href="{{ route('pendidik.home') }}" class="dropdown-item">Dashboard</a>
                    @endif
                    <form action="{{ route('auth.logout') }}" method="post">
                        @csrf
                        <button class="btn-none dropdown-item">Logout</button>
                    </form>
                </div>
            </div>
        </div>
        @endauth
    </div>
</header>
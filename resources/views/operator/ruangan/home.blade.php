@extends('layout.operator.app')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Ruangan
                </div>
                <h2 class="page-title">
                    Kelola Data
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-new-data">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        New Data
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-new-data" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            @include('partials.alert')
            @include('layout.operator.data-information')
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Ruangan</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Akun</th>
                                        <th>Siswa</th>
                                        <th>Wali Kelas</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_ruangan as $data)
                                    <tr>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->keterangan ?? 'Belum diisi' }}</td>
                                        <td>
                                            @php
                                            if ($data->user->email) {
                                            @endphp
                                            <a href="{{ route('operator.user.home', [ 'email' => $data->user->email ]) }}">{{ $data->user->email }}<a>
                                                    @php
                                                    } else {
                                                    @endphp
                                                    Belum diisi
                                                    @php
                                                    }
                                                    @endphp
                                        </td>
                                        <td>{{ $data->siswa->count() ?? '0' }} siswa</td>
                                        <td>{{ $data->wali->nama ?? 'Tidak diketahui' }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td class="d-flex gap-1">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update-{{ $data->id }}">Edit</button>

                                            @push('modals')
                                            <div class="modal modal-blur fade" id="modal-update-{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update {{ $data->nama ?? 'Tidak diketahui' }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('operator.kehadiran.update', $data->id) }}" method="post" id="form-save">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="nama">Nama</label>
                                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kelas" value="{{ $data->nama ?? '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" value="{{ $data->keterangan ?? '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="wali">Wali Kelas</label>
                                                                    <select name="wali" id="wali" class="form-control">
                                                                        @forelse($pendidiks as $pendidik)
                                                                        <option value="{{ $pendidik->id }}">{{ $pendidik->nama }}</option>
                                                                        @empty
                                                                        <option disabled>Data tenaga pendidik kosong</option>
                                                                        @endforelse
                                                                    </select>
                                                                </div>

                                                                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                                                    Cancel
                                                                </a>
                                                                <button type="submit" class="btn btn-primary ms-auto">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M12 5l0 14" />
                                                                        <path d="M5 12l14 0" />
                                                                    </svg>
                                                                    Save Data
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endpush
                                            <a href="{{ route('operator.ruangan.show', $data->id) }}" class="btn btn-primary">Detail</a>
                                            <form action="{{ route('operator.ruangan.destroy', $data->id) }}" method="post" id="{{ 'siswa-' . $data->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <!-- <input type="hidden" name="id" value="{{ $data->id }}"> -->
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
<div class="modal modal-blur fade" id="modal-new-data" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('operator.ruangan.store') }}" method="post" id="form-save">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama ruangan</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Ruangan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Connect user</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($data_users as $users)
                            <option value="{{ $users->id }}">{{ $users->name }} - {{ $users->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                    Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" id="btn-save">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Create new data
                </a>
            </div>
        </div>
    </div>
</div>
@endpush

@push('scripts')
<script>
    $("#btn-save").on("click", function() {
        $("#form-save").submit()
    })

    $(document).ready(function() {
        $(".datatable").DataTable()
    })
</script>
@endpush
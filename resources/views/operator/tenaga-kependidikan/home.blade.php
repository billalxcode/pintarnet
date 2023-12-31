@extends('layout.operator.app')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Tenaga Kependidikan
                    </div>
                    <h2 class="page-title">
                        Kelola Data
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-outline-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-import-data">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-import"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                <path d="M4 6v6c0 1.657 3.582 3 8 3c.856 0 1.68 -.05 2.454 -.144m5.546 -2.856v-6"></path>
                                <path d="M4 12v6c0 1.657 3.582 3 8 3c.171 0 .341 -.002 .51 -.006"></path>
                                <path d="M19 22v-6"></path>
                                <path d="M22 19l-3 -3l-3 3"></path>
                            </svg>
                            Import
                        </a>
                        <a href="#" class="btn btn-outline-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-import-data" aria-label="Create import">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database-import"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3"></path>
                                <path d="M4 6v6c0 1.657 3.582 3 8 3c.856 0 1.68 -.05 2.454 -.144m5.546 -2.856v-6"></path>
                                <path d="M4 12v6c0 1.657 3.582 3 8 3c.171 0 .341 -.002 .51 -.006"></path>
                                <path d="M19 22v-6"></path>
                                <path d="M22 19l-3 -3l-3 3"></path>
                            </svg>
                        </a>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-new-data">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            New Data
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-new-data" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
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
                            <h3 class="card-title">Data Siswa</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>Jabatan</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_tenaga_kependidikan as $data)
                                            <tr>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->alamat ?? 'Belum diisi' }}</td>
                                                <td>{{ $data->kontak }}</td>
                                                <td>{{ $data->jabatan ?? 'Belum diisi' }}</td>
                                                <td>{{ $data->created_at }}</td>
                                                <td class="text-start">
                                                    <form
                                                        action="{{ route('operator.tenaga-kependidikan.destroy', $data->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
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
                    <form action="{{ route('operator.tenaga-kependidikan.store') }}" method="post" id="form-save">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama lengkap">
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Kontak</label>
                                    <input type="text" class="form-control" name="kontak" placeholder="Kontak"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto btn-save">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
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
    <div class="modal modal-blur fade" id="modal-import-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('operator.tenaga-kependidikan.import') }}" method="post" id="form-save"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">File:</label>
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <div class="dropdown ms-auto">
                        <a href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown">Download</a>

                        <div class="dropdown-menu">
                            <a href="{{ route('operator.siswa.convert', 'xlsx') }}" class="dropdown-item">XLSX</a>
                            {{-- <a href="{{ route('operator.siswa.convert', 'xls') }}" class="dropdown-item">XLS</a> --}}
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary ms-auto btn-save">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Import
                    </a>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(".btn-save").on("click", function() {
            const html = $(this).parent().parent().find("#form-save")
            console.log(html)
            html.submit()
        })

        $(document).ready(function() {
            $(".datatable").DataTable()
        })
    </script>
@endpush

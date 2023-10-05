@extends('layout.ruangan.app')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Siswa
                </div>
                <h2 class="page-title">
                    Kelola Siswa
                </h2>
            </div>

        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            @include('partials.alert')
            @include('layout.ruangan.data-information')
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
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Ruangan</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $data)
                                    <tr>
                                        <td>
                                            <span class="text-muted">{{ $data->nis ?? 'Belum diisi' }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $data->nisn ?? 'Belum diisi' }}</span>
                                        </td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->ruangan->nama ?? 'Belum diisi' }}</td>
                                        <td>{{ $data->created_at }}</td>
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

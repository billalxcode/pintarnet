@extends('layout.pendidik.app')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Perizinan
                </div>
                <h2 class="page-title">
                    Kelola Data
                </h2>
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
                            <h3 class="card-title">Permintaan Perizinan</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Ruangan</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
                                            <th>Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_request_izin as $data)
                                        <tr>
                                            <td>{{ $data->siswa->nama }}</td>
                                            <td>
                                                @if ($data->status == "diizinkan")
                                                <span class="badge bg-success">Izin diberikan</span>
                                                @elseif ($data->status == "meminta")
                                                <span class="badge bg-info">Meminta Izin</span>
                                                @elseif ($data->status == "ditolang")
                                                <span class="badge bg-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->siswa->ruangan->nama ?? 'Tidak diketahui' }}</td>
                                            <td>{{ $data->jenis ?? 'Tidak diketahui' }}</td>
                                            <td>{{ $data->keterangan ?? 'Tidak Diketahui' }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td class="d-flex gap-2">
                                                <form action="{{ route('pendidik.perizinan.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                    <input type="hidden" name="status" value="diizinkan">
                                                    <button type="submit" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M5 12l5 5l10 -10"></path>
                                                        </svg>
                                                        Terima
                                                    </button>
                                                </form>
                                                <form action="{{ route('pendidik.perizinan.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                    <input type="hidden" name="status" value="ditolak">
                                                    <button type="submit" class="btn btn-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M5 12l5 5l10 -10"></path>
                                                        </svg>
                                                        Tolak
                                                    </button>
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
</div>
@endsection

@push('modals')
@endpush

@push('scripts')
<script>
    // $(".btn-save").on("click", function() {
    //     const html = $(this).parent().parent().find("#form-save")
    //     html.submit()
    // })

    $(document).ready(function() {
        $(".datatable").DataTable()
    })
</script>
@endpush
@extends('layout.operator.app')

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
                        <h3 class="card-title">Data Perizinan Masuk</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Ruangan</th>
                                        <th>Keterangan</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_perizinan as $data)
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
                                        <td>{{ $data->keterangan ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-update-{{ $data->id }}">Edit</button>

                                            @push('modals')
                                            <div class="modal modal-blur fade" id="modal-update-{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update {{ $data->siswa->nama ?? 'Tidak diketahui' }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('operator.kehadiran.update', $data->id) }}" method="post" id="form-save">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="status">Status</label>
                                                                    <select name="status" id="status" class="form-control">
                                                                        <option value="hadir" {{ $data->status == 'hadir' ? 'selected' : ''}}>Hadir</option>
                                                                        <option value="izin" {{ $data->status == 'izin' ? 'selected' : ''}}>Izin</option>
                                                                        <option value="sakit" {{ $data->status == 'sakit' ? 'selected' : ''}}>Sakit</option>
                                                                        <option value="alpha" {{ $data->status == 'alpha' ? 'selected' : ''}}>Alpha</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" value="{{ $data->keterangan ?? '' }}">
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

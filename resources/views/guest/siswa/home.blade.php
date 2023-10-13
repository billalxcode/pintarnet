@extends('layout.app')

@section('content')
<div class="page-header">
    <div class="container">
        <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @for ($i = 0; $i < $sliders->count(); $i++)
                    <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></button>
                    @endfor
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $item)
                <div class="carousel-item {{ $item === $sliders[0] ? 'active' : '' }}">
                    <img class="d-block w-100" alt="" src="{{ asset('storage/' . $item->storage->path) }}" />
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
<div class="page-body">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-center">Berikut data siswa SMKN 1 Maja</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Ruangan</th>
                                <th>Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $data)
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
                                <td class="d-flex gap-1">
                                    <a href="{{ route('operator.siswa.show', $data->id) }}" class="btn btn-info">Detail</a>
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
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.datatable').DataTable()
    })
</script>
@endpush
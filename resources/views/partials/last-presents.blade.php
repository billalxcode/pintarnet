<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kehadiran</h3>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($last_data_kehadiran as $data)
                    <tr>
                        <td>{{ $data->siswa->nama }}</td>
                        <td>
                            @if ($data->status == "hadir")
                            <span class="badge bg-success">HADIR</span>
                            @elseif ($data->status == "izin")
                            <span class="badge bg-info">IZIN</span>
                            @elseif ($data->status == "sakit")
                            <span class="badge bg-warning">SAKIT</span>
                            @else
                            <span class="badge bg-danger">ALPHA</span>
                            @endif
                        </td>
                        <td>{{ $data->siswa->ruangan->nama ?? 'Tidak diketahui' }}</td>
                        <td>{{ $data->keterangan ?? 'Tidak Diketahui' }}</td>
                        <td>{{ $data->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $(".datatable").DataTable({
            order: [
                [4, "asc"]
            ]
        })
    })
</script>
@endpush

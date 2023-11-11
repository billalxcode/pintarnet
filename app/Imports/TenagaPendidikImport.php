<?php

namespace App\Imports;

use App\Models\MataPelajaran;
use App\Models\TenagaPendidik;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TenagaPendidikImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas, WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            "Tenaga Pendidik" => $this
        ];
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $mapel = MataPelajaran::createMapel($row['mapel']);

            TenagaPendidik::createTenagaPendidik(
                $row['nip'],
                $row['nama_lengkap'],
                ( $row['jk'] == "L" ? "pria" : "wanita" ),
                $row['alamat'],
                $row['tempat_lahir'],
                Carbon::createFromFormat("d/m/Y", $row['tanggal_lahir'])->format("Y-m-d"),
                $mapel->id
            );
        }
    }
}

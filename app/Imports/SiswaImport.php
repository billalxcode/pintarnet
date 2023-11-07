<?php

namespace App\Imports;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SiswaImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas, WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            "Data Siswa" => $this
        ];
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            Siswa::createSiswa(
                $row['nis'],
                $row['nisn'],
                $row['nik'],
                $row['nama_lengkap'],
                $row['tempat_lahir'],
                $row['tanggal_lahir'],
                $row['jk'],
                Carbon::today()->year,
                $row['agama'],
                $row['kontak'],
                $row['alamat'],
                $row['ruangan']
            );
        }
    }

    public function headingRow() {
        return 1;
    }
}

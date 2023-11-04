<?php

namespace App\Imports;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;

class SiswaImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // dd($row);
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

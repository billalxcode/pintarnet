<?php

namespace App\Imports;

use App\Models\Siswa;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[1],
            'nisn' => $row[2],
            'nik' => $row[3],
            'nama' => $row[4],
            'jk' => $row[5],
            'tempat_lahir' => $row[6],
            'tanggal_lahir' => $row[7],
            'tahun_masuk' => Carbon::today('Asia/Jakarta')->year,
            'agama' => $row[8],
            'kontak_siswa' => $row[9],
            'alamat' => fake('id_ID')->address()
        ]);
    }

    public function headingRow() {
        return 1;
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         BeforeSheet::class => function (BeforeSheet $events) {
    //             thi
    //         }
    //     ]
    // }
}

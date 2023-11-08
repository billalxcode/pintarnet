<?php

namespace App\Imports;

use App\Models\TenagaKependidikan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TenagaKependidikanImport implements ToCollection, WithMultipleSheets, WithHeadingRow
{
    public function sheets(): array
    {
        return [
            'Tenaga Kependidikan' => $this
        ];
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            TenagaKependidikan::create([
                'nama' => $row['nama'],
                'alamat' => $row['alamat'],
                'kontak' => $row['kontak'],
                'jabatan' => $row['jabatan']
            ]);
        }
    }
}

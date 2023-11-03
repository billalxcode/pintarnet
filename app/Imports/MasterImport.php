<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MasterImport implements WithMultipleSheets, HasReferencesToOtherSheets, WithCalculatedFormulas
{
    public function sheets(): array
    {
        return [
            "Users" => new UserRuanganImport(),
            "Ruangan" => new RuanganImport(),
            // "Data Siswa" => new SiswaImport()
        ];
    }
}

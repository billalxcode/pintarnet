<?php

namespace App\Imports;

use App\Models\Ruangan;
use Maatwebsite\Excel\Concerns\ToModel;

class RuanganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ruangan([
            'ruangan_id' => $row[1],
            'keterangan' => null,
            'user_id' => null
        ]);
    }
}

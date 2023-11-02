<?php

namespace App\Imports;

use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RuanganImport implements ToModel, ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ruangan([
            'id' => $row[1],
            'keterangan' => null,
            'user_id' => null
        ]);
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $user = User::email($row[2]);
            Ruangan::create(['id' => $row[0], 'name' => $row[1], 'user_id' => ($user->exists() ? $user->id : 0)]);
        }
    }
}

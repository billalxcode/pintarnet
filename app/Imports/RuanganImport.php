<?php

namespace App\Imports;

use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithPreCalculateFormulas;
use Maatwebsite\Excel\Events\BeforeImport;

class RuanganImport implements WithHeadingRow, ToModel, WithCalculatedFormulas
{
    public function model(array $row)
    {
        $user = User::where('email', $row['user']);
        if (!$user->count() > 1) {
            return new Ruangan([
                'nama' => $row['nama'],
                'user' => null
            ]);
        } else {
            $data = $user->get();
            dd($data);
            return new Ruangan([
                'nama' => $row['nama'],
                'user' => $data->id
            ]);
        }
    }
}

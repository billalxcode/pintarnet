<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserRuanganImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $user = User::email($row[2]);
            if (!$user->exists()) {
                $usr = User::create([
                    'name' => $row[1],
                    'email' => $row[2],
                    'password' => $row[3],
                ]);
                $usr->assignRole('ruangan');
            }
        }
    }
}

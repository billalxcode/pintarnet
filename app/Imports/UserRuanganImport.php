<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserRuanganImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    public function model(array $row)
    {
        $user = User::email($row['email']);
        if ($user->exists()) {
            return null;
        }
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password']
        ]);
        // $user = User::email($row['email']);
        // if (!$user->exists()) {
        //     $usr = User::create([
        //         'name' => $row['name'],
        //         'email' => $row['email'],
        //         'password' => $row['password'],
        //     ]);
        //     $usr->assignRole('ruangan');
        // }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public static function createMapel($nama) {
        $mapel = static::where('nama', $nama);
        if (!$mapel->exists()) {
            $mapel_data = static::create([
                'nama' => $nama
            ]);
            return $mapel_data;
        } else {
            return $mapel->first();
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 'nisn', 'nik', 'nama',
        'tempat_lahir', 'tanggal_lahir',
        'jk', 'tahun_masuk', 'agama', 'kontak_siswa',
        'alamat', 'ruangan_id'
    ];

    public function ruangan() {
        return $this->hasOne(Ruangan::class, 'id', 'ruangan_id');
    }
}

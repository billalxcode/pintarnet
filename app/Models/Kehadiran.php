<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'status',
        'ruangan_id', 'keterangan', 'image_path'
    ];

    public function siswa() {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    public function ruangan() {
        return $this->hasOne(Ruangan::class, 'id', 'ruangan_id');
    }
}

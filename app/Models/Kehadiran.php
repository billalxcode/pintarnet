<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'status',
        'entered_by', 'keterangan'
    ];

    public function siswa() {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    public function entered() {
        return $this->hasOne(Siswa::class, 'id', 'entered_by');
    }
}

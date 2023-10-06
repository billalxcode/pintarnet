<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeRuanganx(Builder $query, $ruangan_id) {
        $query->where('ruangan_id', $ruangan_id);
    }

    public function scopeSiswax(Builder $query, $siswa_id) {
        $query->where('siswa_id', $siswa_id);
    }

    public function scopeHadir(Builder $query): void {
        $query->where('status', 'hadir');
    }

    public function scopeSakit(Builder $query): void {
        $query->where('status', 'sakit');
    }

    public function scopeIzin(Builder $query): void {
        $query->where('status', 'izin');
    }

    public function scopeAlpha(Builder $query): void {
        $query->where('status', 'alpha');
    }

    public function scopeBolos(Builder $query): void {
        $query->where('status', 'bolos');
    }
}

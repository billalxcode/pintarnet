<?php

namespace App\Models;

use App\Exceptions\AlreadyPresent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'status', 'mapel_id',
        'ruangan_id', 'keterangan', 'image_path'
    ];

    public function siswa() {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    public function ruangan() {
        return $this->hasOne(Ruangan::class, 'id', 'ruangan_id');
    }

    public function mapel() {
        return $this->hasOne(MataPelajaran::class, 'id', 'mapel_id');    
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

    public static function createKehadiran($siswa_id, $status, $ruangan_id, $storage_path = null, $keterangan = null, $mapel_id = null) {
        $kehadiran_data = static::whereDate('created_at', Carbon::today())
            ->where('siswa_id', $siswa_id);
        if ($kehadiran_data->exists()) {
            throw new AlreadyPresent("Siswa sudah diabsen");
        } else {
            static::create([
                'siswa_id' => $siswa_id,
                'status' => $status,
                'ruangan_id' => $ruangan_id,
                'mapel_id' => $mapel_id,
                'keterangan' => $keterangan,
                'image_path' => $storage_path
            ]);
            return true;
        }
    }
}

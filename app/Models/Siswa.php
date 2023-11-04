<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 'nisn', 'nik', 'nama',
        'tempat_lahir', 'tanggal_lahir',
        'jk', 'tahun_masuk', 'agama', 'kontak_siswa',
        'alamat', 'ruangan_id'
    ];

    public static function boot() {
        parent::boot();
        static::creating(function ($siswa) {
            $nama = Str::of($siswa->nama)->lower()->headline();
            Log::info("Nama: " . $nama);
            $siswa->nama = $nama;
            return $siswa;
        });
    }

    public function ruangan() {
        return $this->hasOne(Ruangan::class, 'id', 'ruangan_id');
    }

    public static function createSiswa(
        string $nis             = "",
        string $nisn            = "",
        string $nik             = "",
        string $nama            = "",
        string $tempat_lahir    = "",
        string $tanggal_lahir   = "",
        string $jk              = "",
        string $tahun_masuk     = "",
        string $agama           = "",
        string $kontak_siswa    = "",
        string $alamat          = "",
        string $ruangan         = ""
    ) {
        $ruangan = Ruangan::createRuangan($ruangan, 'Kelas ' . $ruangan);
        $siswa = static::create([
            'nis' => $nis,
            'nisn' => $nisn,
            'nik' => $nik,
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => Carbon::createFromFormat("d/m/Y", $tanggal_lahir)->format("Y-m-d"),
            'jk' => ($jk == "L" ? "pria" : "wanita"),
            'tahun_masuk' => $tahun_masuk,
            'agama' => $agama,
            'kontak_siswa' => $kontak_siswa,
            'alamat' => $alamat,
            'ruangan_id' => $ruangan->id
        ]);
        return $siswa;
    }

    public function scopeRuanganx(Builder $query, $ruangan_id) {
        $query->where('ruangan_id', $ruangan_id);
    }
}

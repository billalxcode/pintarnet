<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;


    protected $fillable = [
        'nip', 'nama', 'jk', 'alamat', 'tempat_lahir',
        'tanggal_lahir', 'mapel_id', 'user_id'
    ];

    public function mapel() {
        return $this->hasOne(MataPelajaran::class, 'id', 'mapel_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function createTenagaPendidik(
        string $nip = "",
        string $nama = "",
        string $jk = "",
        string $alamat = "",
        string $tempat_lahir = "",
        string $tanggal_lahir = "",
        string $mapel_id = ""
    ) {
        $user = User::createUser($nama);

        static::create([
            'nip' => $nip,
            'nama' => $nama,
            'mapel_id' => $mapel_id,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'jk' => $jk,
            'tanggal_lahir' => $tanggal_lahir,
            'user_id' => $user->id
        ]);
    }
}

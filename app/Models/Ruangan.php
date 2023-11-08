<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'keterangan', 'user_id', 'wali_id'
    ];

    protected $with = ['user'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class);
    }

    public function wali() {
        return $this->hasOne(TenagaPendidik::class, 'id', 'wali_id');
    }
    
    public static function createRuangan(
        string $nama = "",
        string $keterangan = ""
    ) {
        $ruangan = static::where("nama", $nama);
        if ($ruangan->exists() == false) {
            $user = User::createUser($nama);
            $result = static::create([
                'nama' => $nama,
                'keterangan' => $keterangan,
                'user_id' => $user->id
            ]);
            return $result;
        } else {
            return $ruangan->first();
        }
    }
}

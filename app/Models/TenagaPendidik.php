<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaPendidik extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nip', 'nama', 'mapel', 'jk', 'alamat',
        'tempat_lahir', 'tanggal_lahir', 'mapel_id'
    ];

    public function mapel() {
        return $this->hasOne(MataPelajaran::class, 'id', 'mapel_id');
    }
}

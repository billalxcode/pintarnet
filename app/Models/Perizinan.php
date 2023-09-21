<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'guru_id', 'guru_piket_id',
        'keterangan', 'status',
        'exit_at', 'entry_at', 'return_at'
    ];
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id', 'guru_id', 'guru_piket_id',
        'keterangan', 'status', 'jenis', 'ruangan_id',
        'exit_at', 'entry_at', 'return_at'
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($data) {
            $exit_at = $data->exit_at;
            $exit_at_today = Carbon::today()->setTimeFromTimeString($exit_at);
            $data->exit_at = $exit_at_today;
            return $data;
        });
    }

    public function siswa() {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    public function guru() {
        return $this->hasOne(TenagaPendidik::class, 'id', 'guru_id');
    }

    public function ruangan() {
        return $this->hasOne(Ruangan::class, 'id', 'ruangan_id');
    }

    public function scopeStatus(Builder $query, $status) {
        $query->where('status', $status);
    }

    public function scopeJenis(Builder $builder, $jenis) {
        $builder->where('jenis', $jenis);
    }

    public function scopePendidik(Builder $builder, $pendidik_id) {
        $builder->where('guru_id', $pendidik_id);
    }
}

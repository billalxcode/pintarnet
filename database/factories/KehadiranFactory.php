<?php

namespace Database\Factories;

use App\Models\Ruangan;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kehadiran>
 */
class KehadiranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ruangan = Ruangan::all()->random();
        $siswa = Siswa::where('ruangan_id', $ruangan->id)->get()->random();
        
        return [
            'siswa_id' => $siswa->id,
            'status' => Arr::random(['hadir', 'izin', 'sakit', 'alpha']),
            'ruangan_id' => $ruangan->id,
            'keterangan' => fake('id_ID')->sentence()
        ];
    }
}

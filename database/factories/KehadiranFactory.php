<?php

namespace Database\Factories;

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
        return [
            'siswa_id' => Siswa::all()->random()->id,
            'status' => Arr::random(['hadir', 'izin', 'sakit', 'alpha']),
            'entered_by' => Siswa::all()->random()->id,
            'keterangan' => fake('id_ID')->sentence()
        ];
    }
}

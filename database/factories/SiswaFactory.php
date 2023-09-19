<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => random_int(100000, 999999),
            'nisn' => random_int(100000, 999999),
            'nik' => random_int(100000, 999999),
            'nama' => fake('id_ID')->name(),
            'tempat_lahir' => fake('id_ID')->address(),
            'tanggal_lahir' => Carbon::now('Asia/Jakarta'),
            'jk' => 'pria',
            'tahun_masuk' => 2023,
            'agama' => 'Islam',
            'kontak_siswa' => null,
            'alamat' => fake('id_ID')->address()
        ];
    }
}

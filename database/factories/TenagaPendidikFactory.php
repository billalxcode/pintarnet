<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TenagaPendidik>
 */
class TenagaPendidikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => random_int(100000, 9999999),
            'nama' => fake('id_ID')->name(),
            'mapel' => 'Bahasa Indonesia',
            'jk' => 'pria',
            'alamat' => fake('id_ID')->address(),
            'tempat_lahir' => fake('id_ID')->address(),
            'tanggal_lahir' => Carbon::now('Asia/Jakarta')
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TenagaKependidikan>
 */
class TenagaKependidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake('id_ID')->name(),
            'alamat' => fake('id_ID')->address(),
            'kontak' => fake('id_ID')->phoneNumber(),
            'jabatan' => 'Tata usaha'
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Siswa;
use App\Models\TenagaKependidikan;
use App\Models\TenagaPendidik;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perizinan>
 */
class PerizinanFactory extends Factory
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
            'guru_id' => TenagaPendidik::all()->random()->id,
            'guru_piket_id' => TenagaKependidikan::all()->random()->id,
            'keterangan' => fake('id_ID')->sentence(),
            'status' => Arr::random(['request', 'allowed', 'notAllowed', 'progress', 'alreadyBack']),
            'exit_at' => Carbon::now('Asia/Jakarta'),
            'entry_at' => Carbon::now('Asia/Jakarta')->addHour(),
            'return_at' => Carbon::now('Asia/Jakarta')->addHour()
        ];
    }
}

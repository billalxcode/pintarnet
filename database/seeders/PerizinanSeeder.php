<?php

namespace Database\Seeders;

use App\Models\Perizinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerizinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perizinan::factory(30)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\TenagaKependidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenagaKependidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TenagaKependidikan::factory(30)->create();
    }
}

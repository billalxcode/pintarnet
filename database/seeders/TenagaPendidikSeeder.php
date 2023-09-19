<?php

namespace Database\Seeders;

use App\Models\TenagaPendidik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenagaPendidikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TenagaPendidik::factory(20)->create();
    }
}

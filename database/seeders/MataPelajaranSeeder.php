<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = Storage::get('json/mapel.json');
        $json = json_decode($content, true);

        foreach ($json['data'] as $data) {
            MataPelajaran::create(['nama' => $data]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = Storage::get('json/ruangan.json');
        $json = json_decode($content, true);

        foreach ($json['data'] as $data) {
            Ruangan::create(['nama' => $data, 'keterangan' => "Kelas " . $data]);

            $userRuangan = \App\Models\User::factory()->create([
                'name' => $data,
                'email' => Str::of(Str::lower($data))->replace(' ', '') . "@example.net",
            ]);
            $userRuangan->assignRole("ruangan");
        }
    }
}

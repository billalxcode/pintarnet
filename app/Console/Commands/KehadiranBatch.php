<?php

namespace App\Console\Commands;

use App\Models\Kehadiran;
use App\Models\Siswa;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class KehadiranBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kehadiran:batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simpan siswa agar hadir semua';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $siswas = Siswa::all();
        foreach ($siswas as $siswa) {
            Kehadiran::createKehadiran(
                $siswa->id,
                'hadir',
                $siswa->ruangan->id
            );
        }
    }
}

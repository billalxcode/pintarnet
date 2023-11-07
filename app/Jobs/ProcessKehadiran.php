<?php

namespace App\Jobs;

use App\Models\Kehadiran;
use App\Models\Siswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeEncrypted;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessKehadiran implements ShouldQueue, ShouldBeEncrypted
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $timeout = 120;
    
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $siswas = Siswa::all();
        foreach ($siswas as $siswa) {
            Kehadiran::create([
                'siswa_id' => $siswa->id,
                'status' => 'hadir',
                'ruangan_id' => $siswa->ruangan->id,
                'keterangan' => null,
                'image_path' => null
            ]);
        }
    }

}

<?php

namespace App\Providers;

use App\Models\Ruangan;
use App\Models\Siswa;
use App\Models\TenagaKependidikan;
use App\Models\TenagaPendidik;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $total_siswa = 0;
        $total_ruangan = 0;
        $total_tenaga_pendidik = 0;
        $total_tenaga_kependidikan = 0;
        
        if (Schema::hasTable('siswas')) {
            $total_siswa = Siswa::all()->count();
        }
        if (Schema::hasTable('ruangans')) {
            $total_ruangan = Ruangan::all()->count();
        }
        if (Schema::hasTable('tenaga_pendidiks')) {
            $total_tenaga_pendidik = TenagaPendidik::all()->count();
        }
        if (Schema::hasTable('tenaga_kependidikans')) {
            $total_tenaga_kependidikan = TenagaKependidikan::all()->count();
        }

        View::share('total_siswa', $total_siswa);
        View::share('total_ruangan', $total_ruangan);
        View::share('total_tenaga_pendidik', $total_tenaga_pendidik);
        View::share('total_tenaga_kependidikan', $total_tenaga_kependidikan);
    }
}

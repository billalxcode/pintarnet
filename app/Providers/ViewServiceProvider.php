<?php

namespace App\Providers;

use App\Models\Siswa;
use App\Models\TenagaPendidik;
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
        $total_siswa = Siswa::all()->count();
        $total_ruangan = 0;
        $total_tenaga_pendidik = TenagaPendidik::all()->count();
        $total_tenaga_kependidikan = 0;

        View::share('total_siswa', $total_siswa);
        View::share('total_ruangan', $total_ruangan);
        View::share('total_tenaga_pendidik', $total_tenaga_pendidik);
        View::share('total_tenaga_kependidikan', $total_tenaga_kependidikan);
    }
}

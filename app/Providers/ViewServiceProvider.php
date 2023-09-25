<?php

namespace App\Providers;

use App\Models\Kehadiran;
use App\Models\Ruangan;
use App\Models\Siswa;
use App\Models\TenagaKependidikan;
use App\Models\TenagaPendidik;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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
        $this->share_data_operator();
        $this->share_data_ruangan();
    }
    
    public function share_data_ruangan() {
        $total_hadir = 0;
        $total_sakit = 0;
        $total_izin = 0;
        $total_alpha = 0;

        $user = Auth::user();
        if ($user && Schema::hasTable('ruangans')) {
            $ruangan = $user->ruangan;
            $base_query = Kehadiran::where('ruangan_id', $ruangan->id)->whereDate('created_at', Carbon::now('Asia/Jakarta'));
            $total_hadir = $base_query->where('status', 'hadir')->get();
            $total_sakit = $base_query->where('status', 'sakit')->get();
            $total_izin = $base_query->where('status', 'izin')->get();
            $total_alpha = $base_query->where('status', 'alpha')->get();
        }

        View::share('ruangan_total_hadir', $total_hadir);
        View::share('ruangan_total_sakit', $total_sakit);
        View::share('ruangan_total_izin', $total_izin);
        View::share('ruangan_total_alpha', $total_alpha);
    }

    public function share_data_operator() {
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

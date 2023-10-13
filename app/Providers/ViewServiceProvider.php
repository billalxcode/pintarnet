<?php

namespace App\Providers;

use App\Models\Kehadiran;
use App\Models\Ruangan;
use App\Models\Setting\PageSlider;
use App\Models\Siswa;
use App\Models\TenagaKependidikan;
use App\Models\TenagaPendidik;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
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
    public function boot(Guard $auth): void
    {
        View::composer("*", function ($view) {
            $this->share_data_guest($view);
            $this->share_data_operator($view);
            if (Auth::check()) {
                $this->share_data_ruangan($view);
                $this->share_data_user($view);
            }
        });
    }

    public function share_data_guest($view) {
        $sliders = PageSlider::all();
        $view->with('sliders', $sliders);
    }

    public function share_data_user($view) {
        $user = Auth::user();

        $view->with('ruangan', $user->ruangan);
    }

    public function share_data_ruangan($view)
    {
        $total_hadir = 0;
        $total_sakit = 0;
        $total_izin = 0;
        $total_alpha = 0;

        $user = Auth::user();

        if ($user && $user->ruangan) {
            $ruangan = $user->ruangan;

            $total_hadir = Kehadiran::whereDate('created_at', Carbon::today('Asia/Jakarta'))->where(['ruangan_id' => $ruangan->id, 'status' => 'hadir'])->get()->count();
            $total_sakit = Kehadiran::whereDate('created_at', Carbon::today('Asia/Jakarta'))->where(['ruangan_id' => $ruangan->id, 'status' => 'sakit'])->get()->count();
            $total_izin = Kehadiran::whereDate('created_at', Carbon::today('Asia/Jakarta'))->where(['ruangan_id' => $ruangan->id, 'status' => 'izin'])->get()->count();
            $total_alpha = Kehadiran::whereDate('created_at', Carbon::today('Asia/Jakarta'))->where(['ruangan_id' => $ruangan->id, 'status' => 'alpha'])->get()->count();
        }

        $view->with('ruangan_total_hadir', $total_hadir);
        $view->with('ruangan_total_sakit', $total_sakit);
        $view->with('ruangan_total_izin', $total_izin);
        $view->with('ruangan_total_alpha', $total_alpha);
    }

    public function share_data_operator($view)
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

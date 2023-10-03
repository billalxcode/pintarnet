<?php

namespace App\Http\Controllers\Operator\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StorePageSlider;
use App\Models\Setting\PageSlider;
use App\Models\Storage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $data_storages = Storage::all();
        $data_pages_slider = PageSlider::all();

        return view('operator.setting.page', [
            'data_storages' => $data_storages,
            'data_pages_slider' => $data_pages_slider
        ]);
    }

    public function sliderStore(StorePageSlider $request) {
        $data_validated = $request->validated();

        PageSlider::create($data_validated);

        return redirect()->back()->with('success', 'data slider berhasil disimpan');
    }

    public function sliderDestroy($slider_id) {
        $slider_data = PageSlider::find($slider_id);

        if ($slider_data->exists()) {
            $slider_data->delete();

            return redirect()->back()->with('succes', 'data slider berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'data slider gagal dihapus, id tidak ditemukan');
        }
    }
}

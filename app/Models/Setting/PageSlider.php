<?php

namespace App\Models\Setting;

use App\Models\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSlider extends Model
{
    use HasFactory;

    protected $table = 'pages_slider';
    protected $fillable = ['storage_id', 'status'];

    public function storage() {
        return $this->hasOne(Storage::class, 'id', 'storage_id');
    }
}

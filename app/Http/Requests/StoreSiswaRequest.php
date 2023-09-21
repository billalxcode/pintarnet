<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'nis' => 'required|string|unique:siswas',
            'nisn' => 'required|string|unique:siswas',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|in:pria,wanita',
            'tahun_masuk' => 'required|integer|min:1990|max:2023',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'ruangan_id' => 'required|exists:ruangans,id'
        ];
    }
}

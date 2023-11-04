<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTenagaPendidikRequest extends FormRequest
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
            'nip' => 'required|string|unique:tenaga_pendidiks',
            'nama' => 'required|string',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|in:pria,wanita',
            'alamat' => 'required|string'
        ];
    }
}

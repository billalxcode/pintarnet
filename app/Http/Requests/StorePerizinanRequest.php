<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePerizinanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ruangan_id' => 'required|exists:ruangans,id',
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:tenaga_pendidiks,id',
            'guru_piket_id' => 'required|exists:tenaga_kependidikans,id',
            'keterangan' => 'required|string',
            'exit_at' => 'required|date_format:H:i',
            'jenis' => [
                'required',
                'string',
                Rule::in(['keluar'])
            ],
            'status' => [
                'required',
                'string',
                Rule::in(['meminta'])
            ]
        ];
    }
}

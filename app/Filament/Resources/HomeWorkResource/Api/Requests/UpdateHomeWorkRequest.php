<?php

namespace App\Filament\Resources\HomeWorkResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'nama_latihan' => 'required',
			'kategori' => 'required',
			'alat' => 'required',
			'deskripsi' => 'required|string'
		];
    }
}

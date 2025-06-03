<?php

namespace App\Filament\Resources\MenuMakananResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuMakananRequest extends FormRequest
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
			'nama_makanan' => 'required',
			'kalori' => 'required',
			'deskripsi' => 'required|string',
			'image' => 'required'
		];
    }
}

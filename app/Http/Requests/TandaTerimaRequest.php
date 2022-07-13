<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TandaTerimaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tanggal' => 'required|date',
            'surat_jalan_id' => 'required|integer',
            'keterangan' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'tanggal' => 'Tanggal',
            'surat_jalan_id' => 'Surat Jalan',
            'keterangan' => 'Keterangan',
        ];
    }
}

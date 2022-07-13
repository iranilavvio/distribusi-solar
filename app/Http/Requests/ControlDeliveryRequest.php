<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControlDeliveryRequest extends FormRequest
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
            'kode' => 'required|string|max:255',
            'jam_isi' => 'required|string|max:255',
            'jam_finish' => 'required|string|max:255',
            'surat_jalan_id' => 'required|integer',
            'keterangan' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'kode' => 'Kode',
            'jam_isi' => 'Jam Isi',
            'jam_finish' => 'Jam Finish',
            'surat_jalan_id' => 'Surat Jalan',
            'keterangan' => 'Keterangan',
        ];
    }
}

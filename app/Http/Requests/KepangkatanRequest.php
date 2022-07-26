<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KepangkatanRequest extends FormRequest
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
            //nama_pegawai
            'nama_pegawai' => 'required|string|max:255',
            //nip
            'nip' => 'required|string|max:255',
            //alamat
            'alamat' => 'required|string|max:255',
            //no_telp
            'no_telp' => 'required|string|max:255',
            //email
            'email' => 'required|string|max:255',
        ];
    }
}

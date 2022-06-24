<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'kode' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'nama_contact' => 'required',
            'nomor_contact' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'kode' => 'Kode',
            'name' => 'Nama',
            'alamat' => 'Alamat',
            'nama_contact' => 'Nama Contact',
            'nomor_contact' => 'Nomor Contact',
        ];
    }
}

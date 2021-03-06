<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratJalanRequest extends FormRequest
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
            'no_sj' => 'required',
            'tanggal_kirim' => 'required|date',
            'no_kirim' => 'required|string|max:255',
            'driver_id' => 'required',
            'volume' => 'required|numeric',
            'customer_id' => 'required',
            'kota_tujuan' => 'required|string|max:255',
            'seal_a' => 'required|string|max:255',
            'seal_b' => 'required|string|max:255',
            'karyawan_id' => 'required|string|max:255',
        ];
    }

    //attribute labels
    public function attributes()
    {
        return [
            'no_sj' => 'No. Surat Jalan',
            'tanggal_kirim' => 'Tanggal Kirim',
            'no_kirim' => 'No. Kirim',
            'driver_id' => 'Driver',
            'volume' => 'Volume',
            'customer_id' => 'Customer',
            'kota_tujuan' => 'Kota Tujuan',
            'seal_a' => 'Seal A',
            'seal_b' => 'Seal B',
            'karyawan_id' => 'Petugas Catat',
        ];
    }
}

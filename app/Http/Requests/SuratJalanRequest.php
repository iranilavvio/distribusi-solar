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
            'tanggal_kirim' => 'required|date',
            'no_kirim' => 'required|string|max:255',
            'driver_id' => 'required',
            'truck_id' => 'required',
            'volume' => 'required|numeric',
            'kode_prs' => 'required|string|max:255',
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
            'tanggal_kirim' => 'Tanggal Kirim',
            'no_kirim' => 'No. Kirim',
            'driver_id' => 'Driver',
            'truck_id' => 'Truck',
            'volume' => 'Volume',
            'kode_prs' => 'Kode PRS',
            'customer_id' => 'Customer',
            'kota_tujuan' => 'Kota Tujuan',
            'seal_a' => 'Seal A',
            'seal_b' => 'Seal B',
            'karyawan_id' => 'Petugas Catat',
        ];
    }
}

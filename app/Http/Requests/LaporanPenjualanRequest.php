<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaporanPenjualanRequest extends FormRequest
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
            'truck_id' => 'required|integer',
            'driver_id' => 'required|integer',
            'surat_jalan_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'tujuan' => 'required|string',
            'volume' => 'required|integer',
            'keterangan' => 'required|string',
        ];
    }

    //attributes
    public function attributes()
    {
        return [
            'truck_id' => 'Truck',
            'driver_id' => 'Driver',
            'surat_jalan_id' => 'Surat Jalan',
            'customer_id' => 'Customer',
            'tujuan' => 'Tujuan',
            'volume' => 'Volume',
            'keterangan' => 'Keterangan',
        ];
    }
}

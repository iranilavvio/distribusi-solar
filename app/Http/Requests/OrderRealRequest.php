<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRealRequest extends FormRequest
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
            'no_order' => 'required',
            'customer_id' => 'required',
            'alamat' => 'required',
            'receive_po' => 'required',
            'realisasi' => 'required',
            'unreal' => 'required',
            'keterangan' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'no_order' => 'No. Order',
            'customer_id' => 'Customer',
            'alamat' => 'Alamat',
            'receive_po' => 'Receive PO',
            'realisasi' => 'Realisasi',
            'unreal' => 'Unreal',
            'keterangan' => 'Keterangan',
        ];
    }
}

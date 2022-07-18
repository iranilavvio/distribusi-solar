<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseOrderRequest extends FormRequest
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
            'no_po' => 'required|string|max:255',
            'customer_id' => 'required|integer',
            'kuantitas' => 'required|integer',
            'karyawan_id' => 'required|integer',
        ];
    }

    //attributes
    public function attributes()
    {
        return [
            'tanggal' => 'Tanggal',
            'no_po' => 'No. PO',
            'customer_id' => 'Customer',
            'kuantitas' => 'Kuantitas',
            'karyawan_id' => 'Karyawan',
        ];
    }
}

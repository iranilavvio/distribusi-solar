<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendistribusianRequest extends FormRequest
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
            'order_real_id' => 'required|integer',
            'surat_jalan_id' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return [
            'order_real_id' => 'Order Real',
            'surat_jalan_id' => 'Surat Jalan',
        ];
    }
}

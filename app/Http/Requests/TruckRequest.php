<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TruckRequest extends FormRequest
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
            'no_pol' => 'required',
            'no_lambung' => 'required',
            'kuantitas' => 'required',
        ];
    }
    
    public function attributes()
    {
        return [
            'no_pol' => 'Nomor Polisi',
            'no_lambung' => 'Nomor Lambung',
            'kuantitas' => 'Kuantitas',
        ];
    }
}

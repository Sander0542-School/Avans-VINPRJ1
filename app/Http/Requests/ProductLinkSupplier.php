<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductLinkSupplier extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'supplier_id' => 'required|integer',
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute is een verplicht veld.',
            'integer' => ':attribute moet een getal zijn.',
            'numeric' => ':attribute moet een nummer zijn.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'supplier_id' => 'Leverancier Id',
            'product_id' => 'Product Id',
            'price' => 'Prijs',
        ];
    }
}

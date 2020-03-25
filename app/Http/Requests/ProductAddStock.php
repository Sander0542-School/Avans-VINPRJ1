<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddStock extends FormRequest
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
            'productCount' => 'required|integer',
            'productPrice' => 'required',
            'supplierId' => 'required|integer',
            'productId' => 'required|integer',
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
            'productCount.required' => 'Bestel aantal is een verplicht veld',
            'productPrice.required' => 'Product prijs is een verplicht veld',
            'supplierId.required' => 'Leverancier id is een verplicht veld',
            'productId.required' => 'Product id is een verplicht veld',
            'productCount.integer'  => 'Bestel aantal moet een nummer zijn.',
        ];
    }
}

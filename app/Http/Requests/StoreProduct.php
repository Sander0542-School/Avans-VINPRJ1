<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'required|string|max:11',
            'ordercode' => 'required|integer',
            'price' => 'required|numeric',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'active_substances' => 'required|string|max:255',
            'location' => 'required|string|max:11',
            'stock' => 'required|integer',
            'minimum_stock' => 'required|integer',
            'order_quantity' => 'required|integer',
            'packaging_length' => 'required|numeric',
            'packaging_width' => 'required|numeric',
            'packaging_height' => 'required|numeric',
            'consumer_packages' => 'required|integer',
            'packaging_type' => 'required|string|max:255',
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
            'string' => ':attribute moet tekst zijn.',
            'max' => ':attribute mag maximaal :max karakters lang zijn.',
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
            'name' => 'Naam',
            'ordercode' => 'Bestelcode',
            'price' => 'Prijs',
            'short_description' => 'Korte beschrijving',
            'long_description' => 'Lange beschrijving',
            'active_substances' => 'Actieve stoffen',
            'location' => 'Locatie',
            'stock' => 'Voorraad',
            'minimum_stock' => 'Minimum voorraad',
            'order_quantity' => 'Bestelhoeveelheid',
            'packaging_length' => 'Verpakking lengte',
            'packaging_width' => 'Verpakking breedte',
            'packaging_height' => 'Verpakking hoogte',
            'consumer_packages' => 'Product per verpakking',
            'packaging_type' => 'Verpakking type',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'reference' => 'required|unique:products|max:255',
            'product_name' => 'required',
            'observation' => 'required',
            'price' => 'required|max:20',
            'amount' => 'required|max:4',
            'taxes' => 'required|max:2',
            'image' => 'required|file|image|mimes:jpg|max:200',
        ];
    }

    public function messages()
    {
        return [
            'reference.required' => 'Se requiere la referencia',
            'reference.unique' => 'Debe ser de referencia unica',
            'reference.max' => 'Debe tener maximo de caracteres de 255',
            'product_name.required' => 'Nombre del producto es requerido',
            'observation.required' => 'La observacion es requerido',
            'price.required' => 'El precio  es requerido',
            'price.max' => 'El precio  debe ser de un maximo de 20 caracteres',
            'amount.required' => 'La cantidad  es requerido',
            'amount.max' => 'La cantidad  debe ser de un maximo de 4 caracteres',
            'taxes.required' => 'El impuesto  es requerido',
            'taxes.max' => 'El impuesto  debe ser de un maximo de 2 caracteres',
            'image.required' => 'La imagen es requerido',
            'image.file' => 'La imagen es requerido',
            'image.image' => 'La imagen es requerido',
            'image.mimes' => 'La imagen debe ser JPG',
        ];
    }
}

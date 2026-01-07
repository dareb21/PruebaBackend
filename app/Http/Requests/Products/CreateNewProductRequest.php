<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'name' => 'required|string|min:2|max:255',
            'price' => 'required|numeric|min:0',
            'currency_id' => 'required|exists:currencies,id',
            'description' => 'nullable|string|max:500',
            "tax_cost"=>"required|numeric|min:1",
            "manufacturing_cost"=>"required|numeric|min:1"
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
        ];
    }
}

<?php

namespace App\Http\Requests\Products;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Products\CreateNewProductRequest; 

class UpdateProductRequest extends CreateNewProductRequest
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
        return collect(parent::rules())->map(fn ($rule) => 'sometimes|' . $rule)->toArray();
    }
}

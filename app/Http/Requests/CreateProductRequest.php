<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'quantity' => 'required|string',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
            'is_active' => 'nullable| ',
            'image' => 'nullable|image|max:2048',
        ];
    }
}

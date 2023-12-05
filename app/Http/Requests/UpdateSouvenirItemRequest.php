<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSouvenirItemRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'souvenir_name' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'contents' => 'nullable|max:255',
            'image' => 'image|max:1024',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $travel_id = $this->route('travel_id');
        return [
            'category_id' => 'required|numeric',
            'souvenir_name' => [
                'required',
                'string',
                'max:255',
            ],
            'quantity' => 'required|numeric',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'contents' => 'nullable|max:255',
            'image' => 'image|max:1024',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class UpdatePackingItemRequest extends FormRequest
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
            'packing_category_id' => 'required',
            'packing_item_name' => [
                'required',
                'string',
                'max:255',
            ],
        ];
    }

    public function messages()
    {
        return [
            'packing_category_id.required' => 'カテゴリーを選択してください。',
            'name.required' => '品名は必須です。',
            'name.string' => '品名は文字列で入力してください。',
            'name.max' => '品名は255文字以内で入力してください。',
        ];
    }
}

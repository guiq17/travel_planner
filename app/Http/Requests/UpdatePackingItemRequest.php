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
                function ($attribute, $value, $fail) {
                    $travel_id = $this->route('travel_id');
                    $category_id = $this->input('packing_category_id');
                    
                    $exists = DB::table('packing_items')
                        ->join('packing_category_item', 'packing_category_item.packing_item_id', '=', 'packing_items.id')
                        ->where('packing_category_item.travel_id', $travel_id)
                        ->where('packing_category_item.packing_category_id', '=', $category_id)
                        ->where('packing_items.name', $value)
                        ->exists();

                    if ($exists) {
                        $fail('指定された:attributeは既に存在します。');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'packing_category_id.required' => 'カテゴリーを選択してください。',
            'packing_item_name.required' => '品名は必須です。',
            'packing_item_name.string' => '品名は文字列で入力してください。',
            'packing_item_name.max' => '品名は255文字以内で入力してください。',
        ];
    }
}

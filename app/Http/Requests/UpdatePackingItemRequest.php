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
        $travel_id = $this->route('travel_id');
        $category_id = $this->input('packing_category_id');
        $packing_item_id = $this->route('packing_item_id');
        return [
            'packing_category_id' => 'required',
            'packing_item_name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($travel_id, $category_id, $packing_item_id) {
                    $changeCategory = DB::table('packing_items')
                        ->join('packing_category_item', 'packing_category_item.packing_item_id', '=', 'packing_items.id')
                        ->where('packing_category_item.travel_id', $travel_id)
                        ->where('packing_items.name', $value)
                        ->where('packing_items.packing_category_id', '<>', $category_id)
                        ->exists();

                    // カテゴリーだけ変更する場合はそのまま登録できる
                    if ($changeCategory) {
                        return;
                    } else {
                        // カテゴリーを変更せず品名だけ変更する場合は同一カテゴリー内に同一品名がないか確認
                        $existingInSameCategory = DB::table('packing_items')
                            ->join('packing_category_item', 'packing_category_item.packing_item_id', '=', 'packing_items.id')
                            ->where('packing_category_item.travel_id', $travel_id)
                            ->where('packing_category_item.packing_category_id', $category_id)
                            ->where('packing_items.name', $value)
                            ->where('packing_items.id', '<>', $packing_item_id)
                            ->exists();

                        if ($existingInSameCategory) {
                            $fail('指定された:attributeは既に存在します。');
                        }

                        // カテゴリーと品名の両方を変更する場合は他のカテゴリーに同一品名がないか確認
                        $existingInOtherCategories = DB::table('packing_items')
                            ->join('packing_category_item', 'packing_category_item.packing_item_id', '=', 'packing_items.id')
                            ->where('packing_category_item.travel_id', $travel_id)
                            ->where('packing_category_item.packing_category_id', '<>', $category_id)
                            ->where('packing_items.name', $value)
                            ->exists();

                        if ($existingInOtherCategories) {
                            $fail('指定された:attributeは既に存在します。');
                        }
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

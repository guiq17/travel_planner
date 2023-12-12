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
        return [
            'category_id' => 'required|numeric',
            'souvenir_name' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $travel_id = $this->route('travel_id');
                    $category_id = $this->input('category_id');

                    $exists = DB::table('souvenir_items')
                                ->join('souvenir_category_item', 'souvenir_category_item.souvenir_item_id', '=', 'souvenir_items.id')
                                ->where('souvenir_category_item.travel_id', $travel_id)
                                ->where('souvenir_category_item.souvenir_category_list_id', '=', $category_id)
                                ->where('souvenir_items.name', $value)
                                ->exists();

                    if ($exists) {
                        $fail('指定された:attributeは既に存在します。');
                    }
                },
            ],
            'quantity' => 'required|numeric',
            'price' => 'nullable|numeric',
            'url' => 'nullable|url',
            'contents' => 'nullable|max:255',
            'image' => 'image|max:1024',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'note' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'note.required' => 'ノートを入力してください。',
            'note.string' => 'ノートは文字列で入力してください。',
            'note.max' => 'ノートは255文字以内で入力してください。',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
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
            'start_time' => 'required',
            'end_time' => 'required|after_or_equal:start_time',
            'event' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'start_time.required' => '開始時間を入力してください。',
            'end_time.required' => '終了時間を入力してください。',
            'end_time.after_or_equal' => '終了時間は開始時間より後の時間を入力してください。',
            'event.required' => '内容を入力してください。',
            'event.max' => 'タイトルは255文字以内で入力してください。',
            'image.mimes' => '画像はjpg、jpeg、png形式のものを指定してください',
        ];
    }
}

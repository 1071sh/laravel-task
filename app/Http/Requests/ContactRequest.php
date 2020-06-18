<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required',
            'age_id'          => 'not_in: 0',
            'email'           => 'required|email',
            'feedback_text'   => 'max:10000',
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'      => '名前は必ず入力して下さい',
            'age_id.not_in'      => 'この項目は必須です',
            'email.required'     => 'メールは必ず入力して下さい',
            'feedback_text.max'  => '10,000文字以内でお願いします'
        ];
    }
}

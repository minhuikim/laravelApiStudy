<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // 로그인 되었다고 친다
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
            // 필수 입력사항
            // min 최소 입력 글자 수 max 최대 입력 글자 수
            'title' => 'required|min:2|max:10',
            'content' => 'required'
        ];
    }
}

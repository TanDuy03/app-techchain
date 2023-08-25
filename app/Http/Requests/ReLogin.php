<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReLogin extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'ends_with:@gmail.com'],
            'password' => ['required', ':8', 'max:20'],
            'remember-me' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email sai định dạng',
            'email.ends_with' => 'Email phải là @gmail.com',
            //
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải đủ :min ký tự',
            'password.max' => 'Mật khẩu dài hơn :max ký tự',
            //
            'remember-me' => 'Trường này phải chọn',
        ];
    }
}

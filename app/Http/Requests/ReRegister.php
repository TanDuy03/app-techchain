<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReRegister extends FormRequest
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
            'fname' => ['required', 'min:2', 'regex:/^[^\d!@#$%^&*(),.?":{}|<>]*$/'],
            'lname' => ['required', 'min:3', 'regex:/^[^\d!@#$%^&*(),.?":{}|<>]*$/'],
            'email' => ['required', 'email', 'ends_with:@gmail.com', 'unique:users,email'],
            'phone' => [
                'required', 'digits:10', 'numeric', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/', 
                'unique:users,dienthoai'
            ],
            'npassword' => [
                'required', 'min:8', 'max:20', 
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
            ],
            'cfpassword' => ['required', 'min:8', 'same:npassword'],
        ];
    }

    public function messages()
    {
        return [
            //
            'fname.required' => 'Điền trường này',
            'fname.min' => 'Họ không được ít hơn :min ký tự',
            'fname.regex' => 'Vui lòng nhập chữ',
            //
            'lname.required' => 'Điền trường này',
            'lname.min' => 'Tên không được ít hơn :min ký tự',
            'lname.regex' => 'Vui lòng nhập chữ',
            //
            'email.min' => 'Email không được để trống',
            'email.email' => 'Email sai định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.ends_with' => 'Email phải là @gmail.com',
            //
            'phone.required' => 'Điền trường này',
            'phone.numeric' => 'Vui lòng nhập số',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'phone.digits' => 'Số điện thoại phải đủ :digits số',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            //
            'npassword.required' => 'Điền trường này',
            'npassword.min' => 'Mật khẩu phải từ :min ký tự',
            'npassword.max' => 'Mật khẩu vượt quá :max ký tự',
            'npassword.regex' => 'Mật khẩu phải có chữ hoa, ký tự đặc biệt và số',
            //
            'cfpassword.required' => 'Điền trường này',
            'cfpassword.min' => 'Mật khẩu phải từ :min ký tự',
            'cfpassword.same' => 'Mật khẩu không khớp',
        ];
    }
}

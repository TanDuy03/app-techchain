<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReProduct extends FormRequest
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
            'ten_sp' => ['required', 'min:10', 'max:255', 'unique:sanpham,ten_sp'],
            'slug' => ['required', 'min:10', 'unique:sanpham,slug'],
            'gia_km' =>['required', 'integer','min:4'],
            'gia' =>['required', 'integer', 'min:4'],
            'anHien' => ['required'],
            'img__new' => ['required', 'mimes:jpeg,png'],
            'des_pro' => ['required', 'min:5'],
            'proCate' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == 0){
                    $fail('Vui lòng chọn trường này');
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'ten_sp.required' => 'Vui lòng nhập tên',
            'ten_sp.min' => 'Vui lòng nhập hơn :min ký tự',
            'ten_sp.max' => 'Vui lòng nhập ít hơn :max ký tự',
            'ten_sp.unique' => 'Tên đã tồn tại',
            //
            'slug.required' => 'Vui lòng nhập đường dẫn',
            'slug.min' => 'Vui nhập :min ký tự',
            'slug.unique' => 'Đường dẫn đã tồn tại',
            //
            'gia_km.required' => 'Vui lòng nhập giá',
            'gia_km.min' => 'Vui lòng nhập hơn :min chữ số',
            'gia_km.integer' => 'Vui lòng nhập số',
            //
            'gia.required' => 'Vui lòng nhập giá',
            'gia.min' => 'Vui lòng nhập hơn :min chữ số',
            'gia.integer' => 'Vui lòng nhập số',
            //
            'anHien.required' => 'Vui lòng chọn trạng thái',
            //
            'img__new.required' => 'Chọn hình',
            'img__new.mimes' => 'Chọn đúng định dạng jpeg hoặc png',
            'des_pro.required' => 'Vui lòng nhập mô tả',
            'des_pro.min' => 'Vui lòng nhập hơn :min ký tự',
            //
            'proCate.required' => 'Vui lòng chọn mục này',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReNew extends FormRequest
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
            'title' => ['required', 'min:5', 'unique:tin,tieuDe'],
            'slug' => ['required', 'min:5', 'unique:tin,slug'],
            'img__new' => ['required', 'mimes:jpeg,png'],
            'title_pro' => ['required', 'min:5'],
            'des_pro' => ['required', 'min:5'],
            'anHien' => ['required'],
            'idLT' => ['required', 'integer', function($attribute, $value, $fail) {
                if($value == 0){
                    $fail('Vui lòng chọn loại tin');
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được để trống',
            'title.min' => 'Tiêu đề nhỏ hơn :min ký tự',
            'title.unique' => 'Tiêu đề đã tồn tại',
            //
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.min' => 'Đường dẫn nhỏ hơn :min ký tự',
            'slug.unique' => 'Đường dẫn đã tồn tại',
            //
            'img__new.required' => 'Vui lòng chọn hình',
            'img__new.mimes' => 'Vui lòng chọn đúng định dạng png hoặc jpeg',
            //
            'title_pro.required' => 'Không được để trống',
            'title_pro.min' => 'Vui lòng nhập hơn :min ký tự',
            //
            'des_pro.required' => 'Không được để trống',
            'des_pro.min' => 'Vui lòng nhập hơn :min ký tự',
            //
            'anHien' => 'Vui lòng chọn trạng thái',
            'idLT.required' => 'Vui lòng chọn loại tin',
            'idLT.integer' => 'Vui lòng chọn loại tin hợp lệ',
        ];
    }
}

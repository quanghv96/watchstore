<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->segment(3),
            'password' => 'nullable|min:6',
            're_password' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Bạn chưa nhập tên'),
            'phone.required' => __('Bạn chưa nhập số điện thoại'),
            'email.required' => __('Bạn chưa nhập email'),
            'email.email' => __('Email bạn nhập không hợp lệ'),
            'email.unique' => __('Email đã được sử dụng rồi'),
            'password.min' => __('Mật khẩu tối thiểu 6 ký tự'),
            're_password.same' => __('Mật khẩu không khớp'),
        ];
    }
}

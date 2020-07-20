<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'     => 'bail|required|regex:/^[\w\.]{1,32}@[a-z\d]{2,}(\.[a-z\d]{2,4}){1,2}$/',
            'password'  => 'bail|required|min:6|max:20',
        ];
    }
    public function messages() {
        return [
            'email.required'    => 'Vui lòng nhập email - Please enter the email',
            'password.required' => 'Vui lòng nhập mật khẩu - Please enter the password',
            'email.regex'       => 'Email không đúng định dạng - The email field is invalid',
            'password.min'      => 'Mật khẩu tối thiểu 6 ký tự - Password is not less than 6 characters',
            'password.max'      => 'Mật khẩu tối đa 20 ký tự - Password must not exceed 20 characters',
        ];
    }
}

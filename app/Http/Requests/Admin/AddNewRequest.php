<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'mat_khau'  => 'bail|required|min:6|max:20',
            'ten'      => 'bail|nullable|regex:/[^#&<>.,()\[\]*\'`\-=@"~!:;$^%{}?]$/',
            'tai_khoan' =>  'bail|nullable|regex:/[^#&<>.,()\[\]*\'`\-=@"~!:;$^%{}?]$/'
        ];
    }
    public function messages() {
        return [
            'email.required'    => 'Vui lòng nhập email - Please enter the email',
            'mat_khau.required' => 'Vui lòng nhập mật khẩu - Please enter the password',
            'email.regex'       => 'Email không đúng định dạng - The email field is invalid',
            'mat_khau.min'      => 'Mật khẩu tối thiểu 6 ký tự - Password is not less than 6 characters',
            'mat_khau.max'      => 'Mật khẩu tối đa 20 ký tự - Password must not exceed 20 characters',
            'ten.regex'        => 'Tên không được chứa ký tự đặc biệt - The name field is invalid',
            'tai_khoan.regex' => 'Tài khoản không được chứa ký tự đặc biệt - The account field is invalid'
            
        ];
    }
}

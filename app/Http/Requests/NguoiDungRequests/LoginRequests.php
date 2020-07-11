<?php
namespace App\Http\Requests\nguoi_dung;
use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest
{

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email'     => 'bail|required|regex:/^[\w\.]{1,32}@[a-z\d]{2,}(\.[a-z\d]{2,4}){1,2}$/',
            'password'  => 'bail|required|min:6|max:20',
        ];
    }

    public function messages() {
        return [
            'email.required'    => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password',
            'email.regex'       => 'Email không hợp lệ',
            'password.min'      => 'Mật khẩu không ít hơn 6 ký tự',
            'password.max'      => 'Mật khẩu không được vượt quá 20 ký tự',
        ];
    }
}

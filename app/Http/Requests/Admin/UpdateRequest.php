<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'ten'      => 'bail|nullable|regex:/[^#&<>.,()\[\]*\'`\-=@"~!:;$^%{}?]$/',
            
            'tai_khoan' =>  'bail|nullable|regex:/[^#&<>.,()\[\]*\'`\-=@"~!:;$^%{}?]$/'
        ];
    }
    public function messages() {
        return [
            'ten.regex'    => 'Tên không được chứa ký tự đặc biệt - The name field is invalid',
            'tai_khoan.regex' => 'Tài khoản không được chứa ký tự đặc biệt - The account field is invalid'
        ];
    }
}

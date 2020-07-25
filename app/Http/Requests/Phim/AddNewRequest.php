<?php

namespace App\Http\Requests\Phim;

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
            'ten_phim' => 'bail|nullable|regex:/[^#&<>.,0-9()\[\]*`\-=@"~!:;$^%{}?]$/',
        ];
    }
    public function messages() {
        return [
            'ten_phim.regex'   => 'Họ tên không đươc chứa ký tự đặc biệt hoặc số - The full_name format is invalid'
        ];
    }
}

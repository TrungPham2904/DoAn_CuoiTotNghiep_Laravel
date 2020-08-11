<?php

namespace App\Http\Requests\ChiTietDienVien;

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
              'phim_id' =>'bail|required|integer',
              'dien_vien_id' =>'bail|required|integer',
        ];
    }
    public function messages() {
        return [
            
            'dien_vien_id.integer' =>'Diễn viên id chỉ được nhập số',
            'dien_vien_id.required' =>'Diễn viên id không được bỏ trống',
            'phim_id.integer' =>'Phim id chỉ được nhập số',
            'phim_id.required' =>'Phim id không được bỏ trống',


        ];
    }
}

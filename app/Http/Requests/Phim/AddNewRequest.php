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
            'ten_phim' => 'bail|required|nullable|regex:/[^#&<>.,0-9()\[\]*`\-=@"~!:;$^%{}?]$/',
            'loai_phim_id' =>'bail|required|integer',
            'quoc_gia_id'=>'bail|integer|required',
            'kieu_phim_id' =>'bail|integer|required',
            'thoi_luong' =>'bail|integer|required',
            'dien_vien_id' =>'bail|integer',
            'link_server' =>'bail|required',
            'link_trailer' =>'bail|required',
            // 'nam_san_xuat' =>'bail|required|date_format:format:Y',
            'tieu_de' =>'bail|max:1000|required',
            'poster'  => 'bail|required',
            //|nullable|image|mimes:jpg,png,jpeg'
            // 'phim_id' =>'bail|required|integer',

        ];
    }
    public function messages() {
        return [
            'ten_phim.regex'   => 'Tên phim không đươc chứa ký tự đặc biệt hoặc số - The film format is invalid',
            'ten_phim.required' =>'Tên phim không được bỏ trống',
            'loai_phim_id.required' => 'Loại phim id không được bỏ trống',
            'loai_phim_id.integer' => 'Loại phim id chỉ được nhập số ',
            'quoc_gia_id.integer' =>'Quốc gia id chỉ được nhập số',
            'kieu_phim_id.integer' =>'kiểu phim id chỉ được nhập số',
            'thoi_luong.integer' =>'Thời lượng chỉ được nhập số',
            'dien_vien_id.integer' =>'Diễn viên id chỉ được nhập số',
            'link_server.required' =>'Link server không được bỏ trống',
            'link_trailer.required' =>'Link server không được bỏ trống',
            // 'nam_san_xuat.date_format' =>'Năm sản xuất không đúng định dạng',
            'tieu_de.required' => 'Tiêu đề không được bỏ trống',
            'tieu_đề.max' =>'Tiêu đề tối đa 1000 kí tự',
            // 'poster.image'  => 'Hình đại diện không đúng định dạng - The avatar must be an image',
            // 'poster.mimes'  => 'Hình đại diện phải là: png, jpg, jpeg - The avatar must be a file of type: jpg, png, jpeg',
            // 'poster.required' => 'Vui lòng chọn poster - Please enter the poster',
            // 'phim_id.integer' =>'Phim id chỉ được nhập số',


        ];
    }
}

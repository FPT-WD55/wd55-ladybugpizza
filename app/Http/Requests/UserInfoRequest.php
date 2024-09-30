<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:1,2,3',
            'avatar' => 'required|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048',
            'address' => 'required|max:255',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'title' => 'required|max:255',
        ];
    }

    public function messages():array {
        return [
            'fullname.required' => 'Họ và tên không được để trống',
            'date_of_birth.required' => 'Ngày sinh không được để trống',
            'date_of_birth.date' => 'Ngày sinh không đúng định dạng',
            'date_of_birth.before' => 'Ngày sinh không được trước ngày hiện tại',
            'gender.required' => 'Giới tính không được để trống',
            'gender.in' => 'Giới tính không hợp lệ',
            'avatar.required' => 'Ảnh đại diện không được để trống',
            'avatar.mimes' => 'Ảnh đại diện không đúng định dạng',
            'avatar.max' => 'Ảnh đại diện không được quá 2MB',
            'province.required' => 'Tỉnh/Thành phố không được để trống',
            'district.required' => 'Quận/Huyện không được để trống',
            'ward.required' => 'Phường/Xã không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được quá 255 ký tự',
            'title.required' => 'Loại địa chỉ không được để trống',
            'title.max' => 'Loại địa chỉ không được quá 255 ký tự',
        ];
    }
}
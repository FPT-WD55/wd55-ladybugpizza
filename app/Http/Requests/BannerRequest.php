<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'image' => ['required','mimes:jpeg,png,jpg,gif,bmp,svg,webp'],
            'url' => ['required','string'],
            'is_local_page' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Bắt buộc chọn ảnh.',
            'image.mimes' => 'Ảnh bắt buộc phải đúng định dạng.',
            'url.required' => 'url chưa nhập.',
            'url.string' => 'Yêu cầu giá trị của url phải là một chuỗi.',
            'is_local_page.required' => 'Bắt buộc chọn local page.',
        ];
    }
}
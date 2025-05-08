<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>['required', 'string' ,'max:255'],
            'price'=>['required', 'integer' ,'min:1'],
            'quantity'=>['required', 'integer' ,'min:1'],
            'image'=>['required', 'image' ,'mimes:jpg,png,jpeg', 'max:2048'],
            'category_id'=>['required', 'exists:categories,id'],

        ];
    }

    public function messages(){
        return [
            'name.required' => 'Trường tên không được bỏ trống',
            'name.string' => 'Trường tên yêu cầu bắt buộc là KDL ký tự',
            'name.max' => 'Trường tên không được vượt quá 255 ký tự',
            //lab2
        ];
    }
}

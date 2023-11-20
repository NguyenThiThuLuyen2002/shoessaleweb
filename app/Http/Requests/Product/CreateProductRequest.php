<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name_product' => 'required|unique:products,name_product',
            'avt' => 'image|mimes:png,jpg,PNG,jpec',
            'price' => 'required',
            'description' => 'required',

        ];
    }

    public function messages(): array
    {
        return [
            'name_product.required' => 'Tên sản phẩm không được để trống!',
            'name_product.unique' => 'Tên sản phẩm đã có!',
            'avt.image' => 'Định dạng ảnh phải là png,jpg,PNG,jpec!',
            'price.required' => 'Giá sản phẩm không được để trống!',
            'description.required' => 'Mô tả sản phẩm không được để trống!',
        ];
    }
}

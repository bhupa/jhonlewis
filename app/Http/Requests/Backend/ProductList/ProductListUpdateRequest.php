<?php

namespace App\Http\Requests\Backend\ProductList;

use Illuminate\Foundation\Http\FormRequest;

class ProductListUpdateRequest extends FormRequest
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
            'name'=>'required',
            'model'=>'required',
            'brand_id'=>'required|exists:brand,id',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg',
            'short_description'=>'required|max:200',


        ];
    }
}

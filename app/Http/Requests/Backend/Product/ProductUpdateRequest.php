<?php

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title'=>'required',
            'price'=>'required',
            'size'=>'required',
//            'description'=>'required',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg',
            'shape'=>'required',
//            'style'=>'required',
//            'frame_id'=>'nullable|exists:frames,id',
//            'frame_category_id'=>'nullable|exists:frame_category,id',
            'discount_id'=>'nullable|exists:discount,id',
//            'sunglasse_id'=>'nullable|exists:sunglasses,id',
//            'glass_id'=>'nullable|exists:glasses,id',
//            'lens_id'=>'nullable|exists:lenses,id',
            'brand_id'=>'required|exists:brand,id',
        ];
    }
}

<?php

namespace App\Http\Requests\Backend\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
            'name'=>'required|unique:brand,name',
            'description'=>'required',
            'short_description'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg,svg'
        ];
    }
}

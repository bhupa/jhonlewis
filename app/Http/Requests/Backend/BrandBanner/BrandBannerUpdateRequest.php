<?php

namespace App\Http\Requests\Backend\BrandBanner;

use Illuminate\Foundation\Http\FormRequest;

class BrandBannerUpdateRequest extends FormRequest
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
            'image'=>'nullable|mimes:jpeg,png,jpg,svg'
        ];
    }
}

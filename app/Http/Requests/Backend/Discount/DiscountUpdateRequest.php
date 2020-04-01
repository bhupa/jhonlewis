<?php

namespace App\Http\Requests\Backend\Discount;

use Illuminate\Foundation\Http\FormRequest;

class DiscountUpdateRequest extends FormRequest
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
            'percentage'=>'required|numeric|between:0,99.99',
            'short_description'=>'required|max:300',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg',
        ];
    }
}

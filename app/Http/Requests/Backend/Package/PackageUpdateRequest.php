<?php

namespace App\Http\Requests\Backend\Package;

use Illuminate\Foundation\Http\FormRequest;

class PackageUpdateRequest extends FormRequest
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
            'title'=>'required|max:50',
            'image'=>'nullable|mimes:jpeg,png,jpg,svg',
            'short_description'=>'required',
            'description'=>'required',
            'start_date'=>'date_format:Y-m-d',
            'end_date'=>'required|date|after:start_date',
        ];
    }
}

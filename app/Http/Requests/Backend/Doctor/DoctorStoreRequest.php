<?php

namespace App\Http\Requests\Backend\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorStoreRequest extends FormRequest
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
            'specalists'=>'required',
            'facebook'=>'nullable|url',
            'twitter'=>'nullable|url',
            'linkedin'=>'nullable|url',
            'image'=>'required|mimes:jpeg,png,jpg,svg'
        ];
    }
}

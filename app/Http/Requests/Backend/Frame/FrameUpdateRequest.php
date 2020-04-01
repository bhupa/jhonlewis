<?php

namespace App\Http\Requests\Backend\Frame;

use Illuminate\Foundation\Http\FormRequest;

class FrameUpdateRequest extends FormRequest
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
            'name'=>'required|unique:frames,name,'.$this->id
        ];
    }
}

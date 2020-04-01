<?php

namespace App\Http\Requests\Backend\FrameCategory;

use Illuminate\Foundation\Http\FormRequest;

class FrameCategoryStoreResuest extends FormRequest
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
            'name'=>'required|unique:frame_category,name,Null,id,frame_id,'.$this->frame_id,
            'frame_id'=>'required|exists:frames,id'
        ];
    }
}

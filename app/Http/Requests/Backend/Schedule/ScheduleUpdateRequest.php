<?php

namespace App\Http\Requests\Backend\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleUpdateRequest extends FormRequest
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
            'date'=>'required|date|unique:appointment_schedule,date,'.$this->id,
//            'end'=>'required|date|after_or_equal:date',

        ];
    }
}

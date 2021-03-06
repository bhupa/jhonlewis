<?php

namespace App\Http\Requests\Backend\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreRequest extends FormRequest
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
            'date'=>'required|date|unique:appointment_schedule,date',
//            'end'=>'required|date|after_or_equal:date',

        ];
    }
}

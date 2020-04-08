<?php

namespace App\Http\Requests\Frontend\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentStoreRequest extends FormRequest
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
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'phone'=>'required',
//            'date'=>'required|exists:appointment_schedule,date',
            'schedule_id'=>'required|exists:appointment_schedule,id'
        ];
    }
}

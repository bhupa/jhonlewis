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
            'gender'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
//            'address'=>'required',
            'phone'=>'required',
            'date'=>'date_format:d-m-Y|required|',
            'time'=>'in:Early Morning,Late Morning,Early Afternoon,Late Afternoon',
            'details'=>'required'
//            'schedule_id'=>'required|exists:appointment_schedule,id'
        ];
    }
}

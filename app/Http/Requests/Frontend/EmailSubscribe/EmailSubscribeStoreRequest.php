<?php

namespace App\Http\Requests\Frontend\EmailSubscribe;

use Illuminate\Foundation\Http\FormRequest;

class EmailSubscribeStoreRequest extends FormRequest
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
            'email'=>'required|unique:email_subscribe,email'
        ];
    }
}

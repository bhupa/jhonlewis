<?php

namespace App\Http\Requests\Frontend\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
            'address'=>'required',
            'contact'=>'required|numeric',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'confirm'=>'required|same:password',
            'postal_code'=>'required',
//            'zip_code'=>'r',

        ];
    }
}

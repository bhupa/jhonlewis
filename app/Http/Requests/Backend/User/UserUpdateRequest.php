<?php

namespace App\Http\Requests\Backend\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        dd($this->all());
        return [
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$this->id,
            'password'=>"required",
            'confirm'=>'required|same:password',
        ];
    }
}

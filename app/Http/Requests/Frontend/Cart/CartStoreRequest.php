<?php

namespace App\Http\Requests\Frontend\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
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
//        dd($this->all());
        return [
            'stock_id'=>'required|exists:stock,id',
            'piece'=>'required|numeric|min:1|max:'.$this->id.'',
        ];
    }

    public function messages(){
        return [
            'stock_id.required'=>'Please select the Color of the product',
            'stock_id.exists'=>'Please select the Color of the product',
            'piece.max'=>"There is only $this->id piece is left"
            ];
}
}

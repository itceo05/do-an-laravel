<?php

namespace App\Http\Requests\Cinema;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name'=>'required|unique:cinemas,name,'.$this->id,
            'quantity_Room'=>'required|numeric',
            'address'=>'required|unique:cinemas,address,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>' Name Cannot Be Blank, please re-enter.',
            'name.unique'=>" $this->name already exists, please re-enter .",
            'quantity_Room.required'=>' Quantity Room Cannot Be Blank, please re-enter.',
            'quantity_Room.numeric'=>' Quantity Room Food Must Be In The Correct Number Format, please re-enter.',
            'address.required'=>' Address Cannot Be Blank, please re-enter.',
            'address.unique'=>" $this->address already exists, please re-enter .",
        ];
    }
}

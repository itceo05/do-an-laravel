<?php

namespace App\Http\Requests\MovieRoom;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name'=>'required|unique:movie_rooms',
            'quantity_Chair'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>' Name Cannot Be Blank, please re-enter.',
            'name.unique'=>" $this->name already exists, please re-enter .",
            'quantity_Chair.required'=>' Quantity Chair Cannot Be Blank, please re-enter.',
            'quantity_Chair.numeric'=>' Quantity Chair Must Be In The Correct Number Format, please re-enter.',
        ];
    }
}

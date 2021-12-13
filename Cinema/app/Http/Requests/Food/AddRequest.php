<?php

namespace App\Http\Requests\Food;

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
            'name'=>'required|unique:food',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>' Name Food Cannot Be Blank, please re-enter.',
            'name.unique'=>" $this->name already exists, please re-enter.",
            'image.required'=>' Food Image Cannot Be Blank, please re-enter.',
            'image.image'=>' The image is not in the correct format, please re-enter.',
            'price.required'=>' Price Food Cannot Be Blank, please re-enter.',
            'price.numeric'=>' Price Food Must Be In The Correct Number Format, please re-enter.',
        ];
    }
}
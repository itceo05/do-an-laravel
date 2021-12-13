<?php

namespace App\Http\Requests\MovieChair;

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
            'name'=>'required|unique:movie_chairs',
            'price'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>' Name Chair Cannot Be Blank, please re-enter.',
            'name.unique'=>" $this->name already exists, please re-enter.",
            'price.required'=>' Price Cannot Be Blank, please re-enter.',
            'price.numeric'=>' Price Must Be In The Correct Number Format, please re-enter.',
        ];
    }
}
<?php

namespace App\Http\Requests\MovieChair;

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
            'price'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'price.required'=>' Price Cannot Be Blank, please re-enter.',
            'price.numeric'=>' Price Must Be In The Correct Number Format, please re-enter.',
        ];
    }
}

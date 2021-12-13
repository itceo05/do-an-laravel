<?php

namespace App\Http\Requests\Time;

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
            'time'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'time.required'=>' Time Cannot Be Blank, please re-enter.',
        ];
    }
}

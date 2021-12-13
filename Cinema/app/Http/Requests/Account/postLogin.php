<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class postLogin extends FormRequest
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
            'email'=>'required',
            'password'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>' Email Cannot Be Blank, please re-enter.',
            'password.required'=>' Password Cannot Be Blank, please re-enter.',
        ];
    }
}

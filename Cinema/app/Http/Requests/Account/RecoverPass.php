<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RecoverPass extends FormRequest
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
            'password'=>'required',
            'password_confirm'=>'required|same:password',
        ];
    }

    public function messages(){
        return [
            'password.required'=>'Password Cannot Be Blank, please re-enter!',
            'password_confirm.required'=>'Confirm Password Cannot Be Blank, please re-enter!',
            'password_confirm.same'=>'Confirm password is incorrect, please re-enter!',
        ];
    }
}

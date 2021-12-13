<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'min:10',
            'password'=>'required',
            'confirm_password'=>'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>' Email Cannot Be Blank, please re-enter.',
            'name.required'=>' Name Cannot Be Blank, please re-enter.',
            'phone.min'=>' Phone must be 10 or more characters, please re-enter!',
            'password.required'=>' Password Cannot Be Blank, please re-enter.',
            'confirm_password.required'=>' Password Cannot Be Blank, please re-enter.',
            'confirm_password.same'=>' Confirm password is incorrect, please re-enter.',
        ];
    }
}

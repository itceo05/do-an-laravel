<?php

namespace App\Http\Requests\ContactInfo;

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
            'email'=>'required|email',
            'phone'=>'required|min:10',
            'address'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>' Email Cannot Be Blank, please re-enter.',
            'email.email'=>' The Email address is incorrect, please re-enter.',
            'phone.required'=>' Logo Image Cannot Be Blank, please re-enter.',
            'phone.min'=>' Phone number must be 10 or more characters, please re-enter.',
            'address.required'=>' Street Address Cannot Be Blank, please re-enter.',
        ];
    }
}

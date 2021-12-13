<?php

namespace App\Http\Requests\Category;

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
            'name'=>'required|unique:categories',
            'slug'=>'required|unique:categories',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>' Name Chair Cannot Be Blank, please re-enter.',
            'name.unique'=>" $this->name already exists, please re-enter.",
            'slug.required'=>' Slug Cannot Be Blank, please re-enter.',
            'slug.unique'=>" $this->slug already exists, please re-enter.",
        ];
    }
}

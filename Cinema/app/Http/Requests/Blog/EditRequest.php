<?php

namespace App\Http\Requests\Blog;

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
            'title'=>'required|unique:blogs,title,'.$this->id,
            'slug'=>'required|unique:blogs,slug,'.$this->id,
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg',
            'content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>' Title Blog Cannot Be Blank, please re-enter.',
            'title.unique'=>" $this->title already exists, please re-enter.",
            'slug.required'=>' Slug Cannot Be Blank, please re-enter.',
            'slug.unique'=>" $this->slug already exists, please re-enter.",
            'image.image'=>' The image is not in the correct format, please re-enter.',
            'content.required'=>' Content Blog Cannot Be Blank, please re-enter.',
        ];
    }
}

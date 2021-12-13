<?php

namespace App\Http\Requests\ShowTime;

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
            'date'=>'required',
            'cinema_id'=>'required',
            'room_id'=>'required',
            'time_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'date.required'=>' Date Cannot Be Blank, please re-enter.',
            'cinema_id.required'=>' Cinema Cannot Be Blank, please re-enter.',
            'room_id.required'=>' Movie Room Cannot Be Blank, please re-enter.',
            'time_id.required'=>' Time Cannot Be Blank, please re-enter.',
        ];
    }
}

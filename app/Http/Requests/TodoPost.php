<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoPost extends FormRequest
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
            'todo'=>'required',
            'when'=>'required'
        ];
    }
    public function messages(){
        return[
            'todo.required'=>'What to do is required',
            'when.required'=>'When to do is required',
        ];
    }
}

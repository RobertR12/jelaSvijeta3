<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formValidatorRequest extends FormRequest
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
            'title' => 'required|unique:meals|max:150',
            'slug' => 'required|may:50',
            'category_id' => 'required',
            'description' => 'required|max:300',
            'language_id' => 'required'
        ];
    }
}

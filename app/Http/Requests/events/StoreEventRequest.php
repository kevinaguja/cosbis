<?php

namespace App\Http\Requests\events;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required',
            'time' => 'max:255',
            'date' => 'max:255',
            'location' => 'max:255',
            'type' => 'required|max:255',
            'img' => 'image',
            'theme' => 'required|max:255'
        ];
    }
}

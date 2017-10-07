<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateAccountRequest extends FormRequest
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
            'student_number' => 'required',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone' => 'required|max:50',
            'email' => 'required|email|max:100|unique:users,email,'.auth()->user()->id,
            'role' => 'required|max:1',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Carbon\Carbon;
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
        $dt = new Carbon();
        $before = $dt->subYears(15)->format('Y-m-d');
        return [
            'student_number' => 'required|regex:[^([0-9]{4})+(-([0-9]{2})+)+(-([0-9]{5})+)]',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone' => 'required|digits:11',
            'email' => 'required|email|max:100|unique:users,email,'.auth()->user()->id,
            'birthdate' => 'required|date|before:'.$before,
        ];
    }
}

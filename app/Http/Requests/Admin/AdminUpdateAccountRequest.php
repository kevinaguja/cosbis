<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateAccountRequest extends FormRequest
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
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'phone' => 'required|digits:11',
            'email' => 'required|email|max:100|unique:users,email,'.$this['id'],
            'role' => 'required|max:1',
            'birthdate' => 'required|date|before:'.$before,
        ];
    }
}

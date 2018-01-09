<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateCandidateRequest extends FormRequest
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
            'user_id'=>'required',
            'slogan'=>'required',
            'statement'=>'required',
            'party_id'=>'required',
            'position'=>'required',
            'status'=>'nullable',

        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Candidate Name is required.',
            'sloagan.required' => 'Candidate slogan is required.',
            'statement.required' => 'Candidate statement is required',
            'party_id.required' => 'Party field is required.',
            'position_id.required' => 'Position field is required.',
        ];
    }
}

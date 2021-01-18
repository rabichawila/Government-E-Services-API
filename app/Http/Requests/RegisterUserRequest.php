<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'firstname'         => 'required|max:50',
            'lastname'          => 'required|max:50',
            'gender'            => 'required|max:1|min:1',
            'date_of_birth'     => 'required|date_format:Y-m-d|',
            'passport_no'       => 'nullable',
            'national_id'       => 'nullable',
            'email'             => 'required|unique:users|max:150',
            'password'          => 'required|min:6', #|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/
        ];
    }
}

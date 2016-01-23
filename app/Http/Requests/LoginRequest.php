<?php

namespace Simple_Blog\Http\Requests;

use Simple_Blog\Http\Requests\Request;

class LoginRequest extends Request
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
            "email" => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required field',
            'email.email' => 'Email isn\'t follow standard',
            'password.required' => 'Password is required field'

        ];
    }
}

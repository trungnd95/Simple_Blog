<?php

namespace Simple_Blog\Http\Requests;

use Simple_Blog\Http\Requests\Request;

class EditUserRequest extends Request
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
            //
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'radios' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required field',
            'email.required' => 'Eamil is required field',
            'password.required' => 'Password is required field',
            'password.min' => 'Password field is at least 6 characters',
            'radios.required' => 'Role is required field'
        ];
    }
}

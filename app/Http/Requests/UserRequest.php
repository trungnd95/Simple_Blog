<?php

namespace Simple_Blog\Http\Requests;

use Simple_Blog\Http\Requests\Request;

class UserRequest extends Request
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
            'name' => 'required|unique:users,name',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'radios' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required field',
            'name.unique'   => 'This name is exist. If you have the same name, you can add more characters to specific',
            'email.required' => 'Eamil is required field',
            'password.required' => 'Password is required field',
            'password.min' => 'Password field is at least 6 characters',
            'radios.required' => 'Role is required field'
        ];
    }
}

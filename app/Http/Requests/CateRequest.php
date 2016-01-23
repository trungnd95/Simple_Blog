<?php

namespace Simple_Blog\Http\Requests;

use Simple_Blog\Http\Requests\Request;

class CateRequest extends Request
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
            'name' => 'required|unique:cates,name|min:5',
            'description' => 'required'
        ];
    }

    /**
    *   Return message to notice when validate isn't success
    */
    public function messages()
    {
        return [
            'name.min' => 'Name category is too short',
            'name.required' => 'Category name is required',
            'name.unique'   => 'This category was exist',
            'description.required' => 'Description for category is required'
        ];
    }
}

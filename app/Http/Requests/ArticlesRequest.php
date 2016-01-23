<?php

namespace Simple_Blog\Http\Requests;

use Simple_Blog\Http\Requests\Request;

class ArticlesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'     => 'required|min:20',
            'content'   => 'required|min:50',
            'category'   => 'required',
        ];
    }

    public function messages() 
    {   return [
            'title.required'    => 'Please enter your post title',
            'title.min'         => 'Title at least 20 cheracter',
            'content.required'  => 'Please enter your post title',
            'content.min'       => 'Title at least 50 cheracter',
            'category.required'  =>  'You don\'t choose category for this post',
        ];
        
    }
}

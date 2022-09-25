<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' =>'required',
            'temple_id' =>'required',
            'group_id' =>'required',
            'parent_id' =>'required',
        ];
      
        return $rules;
    }
}

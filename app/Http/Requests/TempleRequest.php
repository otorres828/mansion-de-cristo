<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TempleRequest extends FormRequest
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

  
    public function rules()
    {
        $rules = [
            'name' =>'required',
            'slug' =>'required',
            'represent'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required'
        ];
        return $rules;
    }
}
